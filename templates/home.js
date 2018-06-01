var app = angular.module('myApp', ['ngStorage']);

app.service('holder', function() {
    var hello;
    this.myFunc = function (x) {
       hello=x;
      console.log(hello.loan_id);
    }
    this.pie=function(){
        //console.log(hello);
    }
});

app.controller('homeCtrl', function($scope, $http, holder, $localStorage) {



$scope.getUser = function(){
   
       var user_params = $.param({
		       	
                  'username':$scope.username,
                  'password':$scope.password
                  
                 
              });
             
        $http({
          method : "POST",
          url : "../php/UserLogin.php",
          data: user_params,
          headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function mySuccess(response) {
                if (response.data == 'Clear to Go'){
                 location.replace("Home.html");
                
                }else{ console.log('hello');}
          }, function myError(response) {
              
        });    
            
    
    
}


$scope.userGet = function() {   
    $http({
        method : "GET",
        url : "../php/Getuser.php",
        headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
      }).then(function mySuccess(response) {
          $scope.currentUser=response.data['tsr_name'];
          $localStorage.currentUser=$scope.currentUser;
        }, function myError(response) {
          
  });

}





$scope.getRoom = function() {   
    $http({
        method : "GET",
        url : "../php/Getroom.php",
        headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
      }).then(function mySuccess(response) {
          $scope.rooms = response.data;
          console.log(response.data[0]);
        }, function myError(response) {
          $scope.myWelcome = response.statusText;
  });

}

$scope.getLoan = function() {   
    $http({
        method : "GET",
        url : "../php/Getloan.php",
        headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
      }).then(function mySuccess(response) {
          $scope.loans = response.data;
          console.log(response.data[0]);
        }, function myError(response) {
          $scope.myWelcome = response.statusText;
  });

}

$scope.getInvetory = function() {   
    $http({
        method : "GET",
        url : "../php/Getinventory.php",
        headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
      }).then(function mySuccess(response) {
          $scope.inventory = response.data;
         
        }, function myError(response) {
          $scope.myWelcome = response.statusText;
  });

}


$scope.createLoan=function(){
          var loanparams = $.param({
		       	
                  'asset_location':$scope.asset_location,
                  'asset_purpose':$scope.asset_purpose,
                  'asset_borrower':$scope.asset_borrower,
                  'asset_tsrSetup':$scope.currentUser
                 
              });
              
               
              
        $http({
          method : "POST",
          url : "../php/Loan.php",
          data: loanparams,
          headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function mySuccess(response) {
    
          }, function myError(response) {
             $scope.getLoan();
        });
        $scope.getLoan(); 
        $scope.getRoom();
}

$scope.getreport=function(x){
    
  $localStorage.pie=x;
//   console.log($localStorage.pie);
     location.replace("Report.html");
    
    
}

$scope.closeloan=function(){
    
    
}

$scope.createRoom=function(){
          var roomparams = $.param({
		       	
                  'room_name':$scope.room_name,
                  'room_description':$scope.room_description
                   
                 
              });
                console.log(roomparams);
               
              
        $http({
          method : "POST",
          url : "../php/Room.php",
          data: roomparams,
          headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function mySuccess(response) {
            console.log(response.data);
            $scope.getRoom();
          }, function myError(response) {
            
        });
        $scope.getRoom();
   
}


// $scope.createUser=function(){
       
//         var userparams = $.param({
		       	
//                   'username':$scope.username,
//                   'password':$scope.password,
//                   'tsrname':$scope.tsrname,
//                   'level':$scope.level
                   
                   
                 
//               });
//                 // console.log(eqpparams);
               
              
//         $http({
//           method : "POST",
//           url : "../php/User.php",
//           data: userparams,
//           headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
//         }).then(function mySuccess(response) {
//             console.log(response.data);
//           }, function myError(response) {
            
//         });
//         $scope.geteqp();
       
       
       
//   }

$scope.addItem=function(){
          var inventparams = $.param({
		       	
                  'item_name':$scope.eq_name,
                  'item_type':$scope.item_type,
                  'item_location':$scope.eq_location,
                  'item_user':$scope.currentUser,
                  'item_serialNo':$scope.item_serialNo,
             
                 
                   
                 
              });
              
               
              
        $http({
          method : "POST",
          url : "../php/inventory.php",
          data: inventparams,
          headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function mySuccess(response) {
            
            
          }, function myError(response) {
            
        });
   
};

$scope.getInvetory();
$scope.userGet();
$scope.getRoom();
$scope.getLoan();
});











app.controller('reportCtrl', function($scope, $http, holder , $localStorage) {
    
    $scope.currentUser=$localStorage.currentUser;
    
  console.log($localStorage.pie);
  $scope.date=$localStorage.pie.date_created;
  $scope.loanid=$localStorage.pie.loan_id;
  $scope.loanLocation=$localStorage.pie.loan_location;
  $scope.borrower=$localStorage.pie.loan_borrower;
  $scope.loanPurpose=$localStorage.pie.loan_purpose;
  $scope.nums= ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'];
   

  $scope.addeqp=function(){
       
       
        var eqpparams = $.param({
		       	
                  'eqp_name':$scope.eqp_name,
                  'quantity':$scope.quantity,
                  'eqpdescription':$scope.eqpdescription,
                  'serialnum':$scope.serialnum,
                  'loan_id':$scope.loanid
                   
                 
              });
                console.log(eqpparams);
               
              
        $http({
          method : "POST",
          url : "../php/Eqp.php",
          data: eqpparams,
          headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function mySuccess(response) {
            console.log(response.data);
            
          }, function myError(response) {
            
        });
        
        $scope.geteqp();
       
       
       
  }
   
   
  $scope.deleqp=function(x,y){
       alert(y );
    //   if( $scope.eqp_status == 'In Use'){ alert("This equipment is still In use, change status to remove equipment!!");} else{
       
    //     var eqpparams = $.param({
		       	
    //               'eqp_id':x['id'],
                
                 
    //           });
    //             console.log(eqpparams);
               
              
    //     $http({
    //       method : "POST",
    //       url : "../php/Delloan.php",
    //       data: eqpparams,
    //       headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
    //     }).then(function mySuccess(response) {
    //         console.log(response.data);
    //         $scope.geteqp();
    //       }, function myError(response) {
            
    //     });
        
    //   }
       
       
       
  }
      
  $scope.geteqp=function(){
       
        var geteqpparams = $.param({
		       	
                   
                  'loan_id':$scope.loanid
              });
                
               
              
        $http({
          method : "POST",
          url : "../php/Geteqp.php",
          data: geteqpparams,
          headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function mySuccess(response) {
            $scope.items=response.data;
          }, function myError(response) {
            
        });
        // $scope.getRoom();
       
       
       
  }
   
  $scope.geteqp();
});