  $('#txtSearch').on('input',function(){
    console.log("keydown");
    $.ajax({
      method: "GET",
      url: `api-show-users.php`,
      // $("#frmSignup").serialize() -> MUST SERIALIZE -> code that PHP will understand
      dataType: 'json',
      data: {
        username: $('#txtSearch').val()
      },
      cache: false,
    })
      .done((tData)=>{
        console.log(tData)
        console.log($("#txtSearch").val());
        document.getElementById("displayName").innerHTML = "";

        // check if there are any names to show
        if(tData == 0){
          $("#displayName").html(`Sorry, no friends containing the letter ${$("#txtSearch").val()}`);
        }

        // show names in #displayName div
        for(let i=0; i<Object.keys(tData).length; i++){
          var cDiv = document.createElement("div");
          cDiv.innerHTML = tData[i];
          document.getElementById("displayName").appendChild(cDiv);
        }
      })
      .fail(()=>{
        console.log("error");
      });
    return false;
  });