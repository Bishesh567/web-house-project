
<style>
.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px; /* Adjusts for spacing */
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}</style>
<!-- Form -->
<section style="margin-top:100px !important" id="contactus" class="my-5">
  <h1 class="text-center">Let's get started</h1>
      <br>
        <p class="text-center">Tell us a little bit about your project. We will get back to you as soon as you can with some ideas of how we can make your story shine.</p><br>
        <h2 class="text-center">Moonstone Nepal</h2>
        <p class="text-center">{{$details->location}}</p>
        <h5 class="text-center">{{$details->email}}</h5>
        <p class="text-center">{{$details->phone}}</p><br>

        
  <h2 id="sending"  class="text-center">Sending.....</h2>
   <span id="form"></span>
   <span id="show" style="display:none;">
     <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <form id="myForm" method="POST">
         
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="form-outline mb-4">
                 <label class="form-label" for="form3Example3">Name</label>
                <input type="text" name="name" id="name" class="form-control" />
               
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email </label>
                <input type="email" name="email" id="email" class="form-control" />
                
              </div>
      
              <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Message</label>
              <textarea class="form-control" name="message" id="message" rows="3"></textarea>
              </div>
              <button type="submit" id="submitMessage" class="btn btn-primary btn-block mb-4">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
       </span>
      <div class="container my-3 ">
      <div class="col-md-12 text-center">
      <button type="button" class="btn btn-dark" id="sendMessage">Send Message</button>
  
      </div>
    </div>
</section>

<!-- Modal -->

<div class="modal fade" id="mySuccess" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="background-color: #184586;">
            <div class="modal-body">
                <p style="color: #fff;">Thank You For Your Time. We will Contact You As Soon As Possiable!</p>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p class="name error" style="color: red; "></p>
                <p class="email error" style="color: red;"></p>
                <p class="message error" style="color: red;"></p>
            </div>
        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
      document.getElementById("sending").style.display = "none";
        $('#submitMessage').click(function(e) {
          e.preventDefault();
          document.getElementById("sending").style.display = "block";
            let name = $('#name').val();
            let email = $('#email').val();
            let message = $('#message').val();
           
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                url: "/send-message",
                type: "POST",
                data: {
                  
                    name: name,
                    email: email,
                    message: message
                },
                success: function(dataResult) {
                  document.getElementById("sending").style.display = "none";
                    $("#myForm").trigger("reset");
                    var dataResult = JSON.parse(dataResult);

                    if (dataResult.statusCode == 200) {
                         $('#name').empty();
                        $('#mySuccess').modal('show');
                       

                    }
                },
                error: function(errors) {
                  document.getElementById("sending").style.display = "none";
                    $('#myModal').modal('show');
                    $('.error').empty();
                    $('.name').append(errors.responseJSON.name);
                    $('.email').append(errors.responseJSON.email);
                    $('.message').append(errors.responseJSON.message);

                }
            });
        });
    });
</script>