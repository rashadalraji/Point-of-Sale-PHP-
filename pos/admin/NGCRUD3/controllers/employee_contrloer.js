//Reference File app.js
myApp.controller('employee_contrloer', function ($scope, $state, $http, $location) {
    var vm = this;
  
    $scope.currentPage = 1;
    $scope.maxSize = 3;
    this.search_data = function (search_input) {
        if (search_input.length > 0)
            vm.loadData(1);

    };

    this.loadData = function (page_number) {
        var search_input = document.getElementById("search_input").value;
        $http.get('php/employee_select.php?page=' + page_number + '&search_input=' + search_input).then(function (response) {
            //console.log(response.data.employee_data);
            vm.employee_list = response.data.employee_data;
            $scope.total_row = response.data.total;
        });
    };

    $scope.$watch('currentPage + numPerPage', function () {

        vm.loadData($scope.currentPage);

        var begin = (($scope.currentPage - 1) * $scope.numPerPage)
                , end = begin + $scope.numPerPage;


    });
//    

    this.addEmployee = function (info) {
        console.log(info);
        alert('hi');
        $http.post('php/employee_insert.php', info).then(function (response) {
            alert(response.data);
            vm.msg = response.data.message;
            vm.alert_class = 'custom-alert';
            document.getElementById("create_employee_info_frm").reset();
            $('#create_employee_info_modal').modal('toggle');
            vm.loadData($scope.currentPage);

        });
    };

    this.edit_employee_info = function (employee_id) {
        $http.get('php/employee_selectone.php?employee_id=' + employee_id).then(function (response) {
            vm.employee_info = response.data;
        });
    };


    this.updateEmployee = function () {
        $http.put('php/employee_update.php', this.employee_info).then(function (response) {
            vm.msg = response.data.message;
            vm.alert_class = 'custom-alert';
            $('#edit_employee_info_modal').modal('toggle');
            vm.loadData($scope.currentPage);
        });
    };


    this.get_employee_info = function (employee_id) {
        $http.get('php/employee_selectone.php?employee_id=' + employee_id).then(function (response) {
            vm.view_employee_info = response.data;


        });
    };


    this.delete_employee_info = function (employee_id) {
        $http.delete('php/employee_delete.php?employee_id=' + employee_id).then(function (response) {
            vm.msg = response.data.message;
            vm.alert_class = 'custom-alert';
            vm.loadData($scope.currentPage);
        });
    };


});

