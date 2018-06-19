var myApp = angular.module('example_codeenable', ['ui.router', 'ui.bootstrap']);

myApp.config(function ($stateProvider, $locationProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/');
    $stateProvider
            .state('/', {
                url: '/',
                templateUrl: 'templates/employee.html',
                controller: 'employee_contrloer',
                controllerAs: "emp_ctrl",
              
                resolve: {
                    'title': ['$rootScope', function ($rootScope) {
                            $rootScope.title = "ANGULARJS MySQL CRUD";
                        }]
                }

            })
            
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });




});

