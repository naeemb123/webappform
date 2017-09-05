var app = angular.module("webForm",['ngRoute']);

app.config(function($routeProvider){
  $routeProvider.when('/',{
    controller: 'MainController',
    templateUrl: 'Views/form.html'
  }).when('/formCompletion/',{
    controller: 'MainController',
    templateUrl: 'Views/formCompletion.html'
  }).otherwise({
    redirectTo: '/'
  });
});
