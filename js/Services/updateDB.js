app.factory('updateDB',['$http',function($http){
  return {
    updateDatabase: function(data){
      return $http.post('Server/updateDB.php',data)
      .then(function(response){
        return response.data;
      });
    }
  };
}]);
