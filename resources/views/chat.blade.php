@extends("layouts.admin_master")
@section("adminSection")
<h1 class="h3 mb-4 text-gray-800">Chat</h1>
            <div class="row bg-white chat ">
              <div class="col-md-12 col-sm-8">
                <div class="card">
                  <div class="card-header">
                    <div class="user-receiver d-flex align-items-center">
                      <img
                        src=""
                        class="user-receiver--img img img-responsive mr-3"
                      />
                      <div class="user-receiver--info">
                        <h5 class="text-bold">{{$receiver->username}}</h5>
                        <span>{{$receiver->is_online ? 'online' :"offline"}}</span>
                     
                    </div>
                    </div>
                  </div>
                  <div class="card-body" id="chat-box">
                
                    @foreach ($messages as $message )
                         <div class="box-message mb-2 
    {{ auth()->user()->id ==$message->sender_id
        ? 'sender d-md-flex justify-content-end'
        :  'receiver' 
    }}">

                          <div class="message rounded  text-white p-2 {{auth()->user()->id !=$message->sender_id ? 'bg-secondary' :'bg-primary'}}">
                            <p class="mb-0">{{$message->message}}</p>
                            <div class="essage-time d-flex justify-content-end mx-2">{{$message->created_at->format('H:i d-m-Y')}}</div>
                          </div>
                    </div>
                    @endforeach
                   
                  



                  </div>
                  <div class="card-footer">
                    <form  id="message-form">
                        @csrf
                      <div class="form-group ">
                        <div class="input-group mb-3">
                          <textarea name="" class="form-control" id="message-input" ></textarea>
 
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="submit" id="send-button"><i class="far fa-paper-plane"></i></button>
  </div>
</div>
                       
                          
                        </button>
                      </div>
                    </form>
                   
                  </div>
                </div>
              </div>
            </div>



    <script>
        document.addEventListener('DOMContentLoaded', function (){
            
            let receiverId = {{ $receiver->id }};
            let senderId = {{ auth()->id() }};
            let chatBox = document.getElementById('chat-box');
            let messageForm = document.getElementById('message-form');
            let messageInput = document.getElementById('message-input');
            let typingIndicator = document.getElementById('typing-indicator');

          
            

            // subscribe to chat channel
            window.Echo.private('chat.' + senderId)
                        .listen('MessageSent', (e) => {
                            // show the message
                            const messageDiv = document.createElement('div');
                            messageDiv.className = 'mb-2 box-message receiver';
                          
                            messageDiv.innerHTML = `<div class="message rounded  text-white p-2 bg-secondary">
                            <p class="mb-0">${e.message.message}</p>
                            <div class="essage-time d-flex justify-content-end mx-2">${e.message.created_at}</div>
                          </div>`;
                            chatBox.appendChild(messageDiv);
                            chatBox.scrollTop = chatBox.scrollHeight;
                            messageInput.value=''
                        });


          

            messageForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const message = messageInput.value;
                if (message) {
                    fetch(`/chat/${receiverId}/send`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ message })
                    });
                    const now=new Date();
                    let formattedTime =
    (now.getHours()).toString().padStart(2, "0") + ":" +
    now.getMinutes().toString().padStart(2, "0") + " " +
    now.getDate().toString().padStart(2, "0") + "-" +
    (now.getMonth() + 1).toString().padStart(2, "0") + "-" +
    now.getFullYear();
                    const messageDiv = document.createElement('div');
                            messageDiv.className = 'mb-2 box-message sender d-md-flex justify-content-end';
                          
                            messageDiv.innerHTML = `<div class="message rounded  text-white p-2 bg-primary">
                            <p class="mb-0">${message}</p>
                            <div class="essage-time d-flex justify-content-end mx-2">${formattedTime}</div>
                          </div>`;
                            chatBox.appendChild(messageDiv);
                            chatBox.scrollTop = chatBox.scrollHeight;
                            messageInput.value=''
                }
            });


        });
    </script>
@endsection