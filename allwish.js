function escapeHtml(text) {
	return text
		.replace(/&/g, "&amp;")
		.replace(/</g, "&lt;")
		.replace(/>/g, "&gt;")
		.replace(/"/g, "&quot;")
		.replace(/'/g, "&#039;");
}

$(function(){
  getinfo();
})


function getinfo() {
  $.ajax({
    type: 'GET',
    url: "./block"
  }).done(function(data) {
	  //console.log(data);
    data = JSON.parse(data)
    var j = data.length
    for(i=0;i<j;i++){
		id = data[i].id;
		if(id!=0){
			id = data[i].id;
			text = escapeHtml(decodeURIComponent(atob(data[i].text)));
			hash = data[i].hash;
			time = data[i].time;
			$("#allbody").prepend('<br><hr><div style="color:#000000;" class="card"><div class="card-header">Block #'+id+' <cite>'+time+' UTC+1</cite></div><div class="card-body"><blockquote class="blockquote mb-0"><p>'+text+'</p><footer class="blockquote-footer"><cite>'+hash+'</cite></footer></blockquote></div></div>')
		}　
    }
  })
}


function getblock(s) {
  $.ajax({
    type: 'GET',
    url: "./block"
  }).done(function(data) {
    localStorage["block"] = data
    if(s!="no"){
      toastr.clear()
      toastr.success("<h3>區塊更新成功</h3>")
    }
  })
}
