  $('#txtSearch').on('input',function(){
    // console.log("key pressed");
    $usernameToBeFound = $('#txtSearch').val();

    $.ajax({
      method: "GET",
      url: 'api-show-searched-users.php',
      // $("#frmSignup").serialize() -> MUST SERIALIZE -> code that PHP will understand
      dataType: 'text',
      data: {
        username: $usernameToBeFound
      },
      cache: false,
    })
    .done((tData)=>{
      console.log(tData);
      let aUsers = JSON.parse(tData);
      console.log(aUsers); // it logs the array of names or empty array if there are no names found
      // empty the suggestions div before adding names there
      $("#displayName").empty();
      // check if there are any names to show
      if(aUsers.length == 0){
        $("#displayName").html(`Sorry, no friends containing '${$usernameToBeFound}'`);
      }
      aUsers.forEach((user)=>{
        // show each suggested name in a separate div
        $('#displayName').append('<div>'+user+'</div>');    
      })
    })
    .fail(()=>{
      console.log("error");
    });
    
    return false;
  });