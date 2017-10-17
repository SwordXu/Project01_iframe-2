(()=>{
	const LIWIDTH=62;
  $.get("data/03-product-details/details.php",location.search.slice(1))
	  .then(data=>{
     var details=data.details,family=data.family;
	 $("#mImg").attr("src",details.picList[0].md);
	 var html="";
	 for(var pic of details.picList){
	  html+=
		  `<li><img src="${pic.sm}"
	       data-md="${pic.md}"
	       data-lg="${pic.lg}"/li>`
	 }
      $("#icon_list").html(html).css("width",LIWIDTH*details.picList.length);
	//右上基本信息
	$("#show-details>h1").html(details.title);
	$("#show-details>h3>a").html(details.subtitle);
	$("#show-details .stu-price>span").html("￥"+details.price);
 	$("#show-details .promise").append(details.promise);
    //规则
	var html="";
	for(var f of family.laptopList){
	 html+=
	  `<a
	 	 href="03-product-details.html?lid=${f.lid}"
	     class=${
		  f.lid===details.lid?"active":""
		 }>${f.spec}</a>`;
	}
	$("#show-details .spec>div").html(html);
	//下方规格参数
	$("#param>ul").html(`
		    <li>
              <a href="#">商品名称：${details.lname}</a>
            </li>
            <li>
              <a href="#">容量：${details.memory}</a>
            </li>`);
			$("#product-intro").html(details.details);
  })
})()