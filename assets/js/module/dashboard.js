// Angular script to add required skills in ad product form
var app = angular.module("dashApp", ['ngSanitize']);
app.controller("DashController", function ($scope, $http, $window) {
//------------------------------------------------------------------------------------------------------//
$scope.totalmem=0;
$scope.malemem=0;
$scope.femalemem=0;
$scope.totrevenue=0;
// get all statistics data on dashboard
$scope.getAllStatistics = function () {
    $http({
       method: 'get',
       url: BASE_URL + "admin/dashboard/getAllStatistics",
         //params: {product_id: product_id},
     }).then(function successCallback(response) {
        if (response.data != '' && response.data!='false') {
            $scope.totalmem=response.data.total_mem;
            $scope.malemem=response.data.male_count;
            $scope.femalemem=response.data.female_count;
        }
    }); 
 };
 $scope.getAllStatistics();

// get all membership packages on dashboard
$scope.getAllPackages = function () {    
    $http({
       method: 'get',
       url: BASE_URL + "admin/dashboard/getAllPackages",
   }).then(function successCallback(response) {
    if (response.data != '' && response.data!='false') {
        var package_benefits,i;
        $scope.packages = [];
        for (i = 0; i < response.data.length; i++) {
            package_benefits = JSON.parse(response.data[i].package_benefits);
            $scope.packages.push({'package_title': response.data[i].package_title,
                'package_price': response.data[i].package_price,
                'package_status': response.data[i].package_status,
                'package_period': response.data[i].package_period,
                'package_validity': response.data[i].package_validity,
                'package_id': response.data[i].package_id,
                'package_benefits': package_benefits});
        }
    }
    else{
        $scope.packages='false';
    }
}); 
};
$scope.getAllPackages();

// add benefit to temp
$scope.benefits = [];

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
            $scope.errortext = "This Requirement is already Added.";
        }
    };

    // remove benefit from temp
    $scope.removeBenefit = function (x) {
        $scope.errortext = "";
        $scope.benefits.splice(x, 1);
        $scope.requirementJSON = JSON.stringify($scope.benefits);
        $scope.benefitAddedField = JSON.stringify($scope.benefits);
    };

    // remove package from dqshbaord
    $scope.removePackage = function (package_id) {
      $.confirm({
        title: '<h4 class="w3-text-red">Please confirm the action!</h4><span class="w3-medium">Do you really want to delete this package?</span>',
        content: '',
        type: 'red',
        buttons: {
          confirm: function () {
             $http({
               method: 'get',
               url: BASE_URL + "admin/dashboard/delPackage/"+package_id,
           }).then(function successCallback(response) {
            $scope.delPkgMessage = response.data;
            $scope.getAllPackages();
            $window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
          // location.reload();
      }, 1500);
        }); 
       },
       cancel: function () {
       }
   }
});
  }
});

// ----function to open modal ------//
function openModal() {
  var modal=$('.modal');
  modal.addClass('in');
}

// ------------POST form data to PHP controller--------------
$(function () {
    $("#addNewPackageForm").submit(function () {
        $('#pkg_form_message').html('');
        dataString = $("#addNewPackageForm").serialize();
        // alert(dataString);
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
        $.ajax({
            type: "POST",
            url: BASE_URL + "admin/dashboard/addNewPackage",
            dataType: 'text',
            data: dataString,
            return: false, //stop the actual form post !important!
            beforeSend: function () {
                $("#addPackageBtn").attr("disabled", true);
                $('#addPackageBtn').html(' <i class="fa fa-circle-o-notch fa-spin w3-large"></i> Adding New Package ... ');
            },
            success: function (data) {
                //$.alert(data);
                $('#pkg_form_message').html(data);
                $('form :input').val("");
                $('#addPackageBtn').removeAttr("disabled");
                $('#addPackageBtn').html('Add New Package');
                window.setTimeout(function() {
                  location.reload();
              }, 1000);
            },
            error: function (data) {
                $('#addPackageBtn').removeAttr("disabled");
                $('#pkg_form_message').html('<p class="w3-text-white w3-red w3-padding-small"><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</p>');
                $('#addPackageBtn').html('Add New Package');
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
