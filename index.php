<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Page Title</title>
  <script src="https://cdn.tailwindcss.com"></script> <!-- TailwindCss -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> <!-- jQuery -->

</head>

<body>

  <?php
  // TailwindCss Class
  $questionContainer = 'border p-2';
  $questionTitleStyle = 'text-lg font-bold capitalize';
  $consoleContainer = 'w-full min-h-[50px] border border-red-200 mt-3';
  $consoleTitleStyle = 'text-md underline capitalize';
  $labelStyle = 'block mb-2 text-sm font-medium text-gray-900';
  $inputConatainer = 'flex gap-3';
  $inputStyle = 'flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5';
  $submitButton = 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center';
  ?>

  <div class='grid grid-cols-3'>
    <div class='<?= $questionContainer ?>'>
      <p class='<?= $questionTitleStyle ?>'>Question 1</p>
        <div>
          <label for="input_question_1" class="<?= $labelStyle ?>">Member Type</label>
          <div class="<?= $inputConatainer ?>">
            <input type="text" id="input_question_1" class="<?= $inputStyle ?>" placeholder="Member Type" required />
            <button id="submit_question_1" class="<?= $submitButton ?>">Download</button>
            <button id="clear_question_1" class="<?= $submitButton ?>">Clear</button>
          </div>
        </div>
      <div class='<?= $consoleContainer ?>'>
        <p class='<?= $consoleTitleStyle ?>'>Console: </p>
        <p id='console_question_1'></p>
      </div>
    </div>
    <div class='<?= $questionContainer ?>'>
      <p class='<?= $questionTitleStyle ?>'>Question 2</p>
        <div>
          <label for="input_question_2" class="<?= $labelStyle ?>">Purchase Value</label>
          <div class="<?= $inputConatainer ?>">
            <input type="text" id="input_question_2" class="<?= $inputStyle ?>" placeholder="Purchase Value" required />
            <button id="submit_question_2" class="<?= $submitButton ?>">Check Discount</button>
            <button id="clear_question_2" class="<?= $submitButton ?>">Clear</button>
          </div>
        </div>
      <div class='<?= $consoleContainer ?>'>
        <p class='<?= $consoleTitleStyle ?>'>Console: </p>
        <p id='console_question_2'></p>
      </div>
    </div>
    <div class='<?= $questionContainer ?>'>
      <p class='<?= $questionTitleStyle ?>'>Question 3</p>
        <div>
          <label for="input_question_3_startDate" class="<?= $labelStyle ?>">Start Date</label>
          <div class="<?= $inputConatainer ?>">
            <input type="text" id="input_question_3_startDate" class="<?= $inputStyle ?>" placeholder="Start Date" required />
          </div>
          <label for="input_question_3_endDate" class="<?= $labelStyle ?>">End Date</label>
          <div class="<?= $inputConatainer ?>">
            <input type="text" id="input_question_3_endDate" class="<?= $inputStyle ?>" placeholder="End Date" required />
          </div>
          <div class="flex gap-3 mt-2">
            <button id="submit_question_3" class="<?= $submitButton ?>">Calculate</button>
            <button id="clear_question_3" class="<?= $submitButton ?>">Clear</button>
          </div>
        </div>
      <div class='<?= $consoleContainer ?>'>
        <p class='<?= $consoleTitleStyle ?>'>Console: </p>
        <p id='console_question_3'></p>
      </div>
    </div>
    <!-- <div class='<?= $questionContainer ?>'>
      <p class='<?= $questionTitleStyle ?>'>Question 4</p>
    </div> -->
  </div>

  <script>
    $(document).ready(function() {
      $('#clear_question_1').click(function() {
        $('#console_question_1').html('')
      });
      $('#clear_question_2').click(function() {
        $('#console_question_2').html('')
      });
      $('#clear_question_3').click(function() {
        $('#console_question_3').html('')
      });

      $('#submit_question_1').click(function() {
        if ($('#input_question_1').val() == '') {
          return;
        }

        $.ajax({
          url: 'Question_1.php',
          type: 'POST',
          data: {
            memberType: $('#input_question_1').val(),
          },
          dataType: 'json',
          success: function(response) {
            $('#console_question_1').append(response.message + '<br>');
          },
          error: function(jqXHR) {
            var errorMessage = 'An error occurred.';
            if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
              errorMessage = jqXHR.responseJSON.error;
            }
            $('#console_question_1').append(errorMessage + '<br>');
          }
        });
      });

      $('#submit_question_2').click(function() {
        if ($('#input_question_2').val() == '') {
          return;
        }

        $.ajax({
          url: 'Question_2.php',
          type: 'POST',
          data: {
            purchaseValue: $('#input_question_2').val(),
          },
          dataType: 'json',
          success: function(response) {
            $('#console_question_2').append(response.message + '<br>');
          },
          error: function() {
            $('#console_question_2').text('An error occurred');
          }
        });
      });

      $('#submit_question_3').click(function() {
        if ($('#input_question_3_startDate').val() == '' || $('#input_question_3_endDate').val() == '') {
          return;
        }

        $.ajax({
          url: 'Question_3.php',
          type: 'POST',
          data: {
            startDate: $('#input_question_3_startDate').val(),
            endDate: $('#input_question_3_endDate').val(),
          },
          dataType: 'json',
          success: function(response) {
            $('#console_question_3').append(response.message + '<br>');
          },
          error: function(jqXHR) {
            var errorMessage = 'An error occurred.';
            if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
              errorMessage = jqXHR.responseJSON.error;
            }
            $('#console_question_3').append(errorMessage + '<br>');
          }
        });
      });
    });
  </script>

</body>

</html>
