app.controller('MainController',['$scope','updateDB',function($scope,updateDB){
  $scope.messageTooLong = false;
  $scope.postFailed = false;


  $scope.submitForm = function(){
    if ($scope.userForm.$valid){
      if ($scope.user.message.length > 250) {
        $scope.messageTooLong = true;
        return;
      }

      $scope.messageTooLong = false;
      $scope.data = {'name':$scope.user.name,'email':$scope.user.email,'message':$scope.user.message};

      updateDB.updateDatabase($scope.data).then(function(data){
        $scope.response = data;
        if ($scope.response == 1){
          $scope.postFailed = false;
          location.assign('#!formCompletion/');
        }
        else{
          $scope.postFailed = true;
        }
      });


    }
  }


}]);
