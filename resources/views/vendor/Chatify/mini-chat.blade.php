<button class="open-button" onclick="openForm()"><i class="fa fa-comments"></i></button>


<iframe height="480" width="330" class="chat-popup" id="myForm" src="/chatify" title="chat">

</iframe>


<script>
    function openForm() {
        console.log( $('#myForm').is(':visible'))
        if( $('#myForm').is(':visible')){
            document.getElementById("myForm").style.display = "none";
        }else{
            document.getElementById("myForm").style.display = "block";
        }
    }
</script>

<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    /* Button used to open the chat form - fixed at the bottom of the page */
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        position: fixed;
        bottom: 5px;
        right: 5px;
        width: 60px;
        border-radius: 100px;
        z-index: 100;
    }

    /* The popup chat - hidden by default */
    .chat-popup {
        display: none;
        position: fixed;
        bottom: 5;
        right: 10px;
        z-index: 9;
        border-radius: 13px;
    }

    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        resize: none;
        min-height: 200px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
        opacity: 1;
    }
</style>
