// Angular script to add required skills in ad product form
var app = angular.module("editPkgApp", ['ngSanitize']);
app.controller("editPkgController", function ($scope, $http, $window) {
//------------------------------------------------------------------------------------------------------//

// add benefit to temp
$scope.benefits = [];
$scope.benefitAddedField='';
// if already benefits json present then,
var preBenefits=angular.element(document.getElementById("prebenefitAddedField")).val();
if(preBenefits!='' && preBenefits!='[]'){
  $scope.benefitAddedField=preBenefits;
  $scope.benefits=JSON.parse(preBenefits);
}

$scope.addBenefitFunc = function () {
  $scope.errortext = "";
  if (!$scope.addBenefit) {
    return;
  }
  if ($scope.benefits.indexOf($scope.addBenefit) == -1) {
    $scope.benefits.push($scope.addBenefit);
    $scope.requirementJSON = JSON.stringify($scope.benefits);
    $scope.benefitAddedField = JSON.stringify($scope.benefits);
            // alert($scope.requirementJSON);
            $scope.addBenefit = '';
          } else {
            $scope.errortext = "ERROR: This Benefit is already Added.";
          }
        };

    // remove benefit from temp
    $scope.removeBenefit = function (x) {
      $scope.errortext = "";
      $scope.benefits.splice(x, 1);
      $scope.requirementJSON = JSON.stringify($scope.benefits);
      $scope.benefitAddedField = JSON.stringify($scope.benefits);
    };
  });

// ----function to open modal ------//
function openModal() {
  var modal=$('.modal');
  modal.addClass('in');
}

// ------------POST form data to PHP controller--------------
$(function () {
  $("#editPackageForm").submit(function () {
    $('#pkg_form_message').html('');
    dataString = $("#editPackageForm").serialize();
        // validate form fields
        $('#perioderror').html('');
        $('#errortext').html('');
        if($('#pkg_period').val()=='0'){
          $('#perioderror').html('<i class="fa fa-times"></i> ERROR: Please select Package Period!');
          return false;
        }
        if($('#benefitAddedField').val()=='' || $('#benefitAddedField').val()=='[]'){
          $('#errortext').html('<i class="fa fa-times"></i> ERROR: Add atleast 1 benefit for this package !');
          return false;
        }
        // alert(dataString);
        $.ajax({
          type: "POST",
          url: BASE_URL + "admin/dashboard/editPackageChanges",
          dataType: 'text',
          data: dataString,
            return: false, //stop the actual form post !important!
            beforeSend: function () {
              $("#editPackageBtn").attr("disabled", true);
              $('#editPackageBtn').html(' <i class="fa fa-circle-o-notch fa-spin w3-large"></i> Updating Changes ... ');
            },
            success: function (data) {
                //$.alert(data);
                $('#pkg_form_message').html(data);
                // $('form :input').val("");
                $('#editPackageBtn').removeAttr("disabled");
                $('#editPackageBtn').html('Save Changes');
                // window.setTimeout(function() {
                //   location.reload();
                // }, 5000);
              },
              error: function (data) {
                $('#editPackageBtn').removeAttr("disabled");
                $('#pkg_form_message').html('<p class="w3-text-white w3-red w3-padding-small"><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</p>');
                $('#editPackageBtn').html('Save Changes');
                window.setTimeout(function () {
                  $(".message").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                  });
                }, 5000);
              }
            });
        return false;  //stop the actual form post !important!
      });
});
// POST method to add package ends here--------------------------
