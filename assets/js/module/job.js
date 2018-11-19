// Angular script to add required skills in ad product form
var app = angular.module("addJobApp", ['ngSanitize']);
app.controller("jobCtrl", function ($scope, $http) {
//------------------------------------------------------------------------------------------------------//
    $scope.products = [];

    // add skill to temp 
    $scope.addSkill = function () {
        $scope.errortext = "";
        if (!$scope.addSkillbtn) {
            return;
        }
        if ($scope.products.indexOf($scope.addSkillbtn) == -1) {
            $scope.products.push($scope.addSkillbtn);
            $scope.skilJSON = JSON.stringify($scope.products);
        } else {
            $scope.errortext = "This Requirement is already listed.";
        }
        $scope.addSkillbtn = '';
    };
//--------------------------------------------------------------------------------------------------------------------------------
    // remove skill from temp
    $scope.removeSkill = function (x) {
        $scope.errortext = "";
        $scope.products.splice(x, 1);
        $scope.skilJSON = JSON.stringify($scope.products);
    };

});

// ------------POST form data to PHP controller--------------
$(function () {
    $("#add_jobform").submit(function () {
        dataString = $("#add_jobform").serialize();
        $('#btnsubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Posting Job. Hang on...</b></span>');
        $.ajax({
            type: "POST",
            url: BASE_URL + "admin/post_job/saveJob",
            dataType: 'text',
            data: dataString,
//            return: false, //stop the actual form post !important!          
            success: function (data) {
                $('#btnsubmit').html('<span>Save and Add New Product</span>');
                $('#jobErrMsg').html(data);
            }
        });
        return false;  //stop the actual form post !important!
    });
});
