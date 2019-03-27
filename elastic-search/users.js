  $('#txtSearch').on('input',function(){
    // console.log("keydown");
    $usernameToBeFound = $('#txtSearch').val();
    $.ajax({
      method: "GET",
      url: 'api-show-users.php',
      // $("#frmSignup").serialize() -> MUST SERIALIZE -> code that PHP will understand
      dataType: 'text',
      data: {
        username: $usernameToBeFound
      },
      cache: false,
    })
      .done((tData)=>{
        console.log(tData)
        let aUsers = JSON.parse(tData);
        console.log(aUsers); // it logs the object with names or 0 if there are no names found

        $("#displayName").empty();

        // check if there are any names to show
        if(aUsers.length == 0){
          $("#displayName").html(`Sorry, no friends containing '${$usernameToBeFound}'`);
        }

        aUsers.forEach((user)=>{
          // show names in #displayName div
          $('#displayName').append('<div>'+user+'</div>');    
        })
      })
      .fail(()=>{
        console.log("error");
      });
    return false;
  });