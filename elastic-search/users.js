  $('#txtSearch').on('input', function(){
    $.ajax({
      method: "GET",
      url: "api-show-users.php",
      // $("#frmSignup").serialize() -> MUST SERIALIZE -> code that PHP will understand
      data: {text:$('#txtSearch').val()},
      cache: false,
      dataType: 'text'
    })
      .done((tData)=>{
        console.log($("#txtSearch").val())
        $('#displayName').html(tData);
      })
      .fail(()=>{
        console.log("error");
      });
    return false;
  });