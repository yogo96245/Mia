(function( $ ) {
  $.fn.jqmultilang = function(L) {
	$(this).html($(this).data("lang-" + L));
	if ($(this).data("lang-" + L + "-rtl") == true)
	{
		$(this).css("direction","rtl")
	}else
	{
		$(this).css("direction","ltr")
	}
  };
})( jQuery );
function mutilang (language) {
    $('.jq-multilang-gallery').jqmultilang(language);
    $('.jq-multilang-commodity').jqmultilang(language);
	$('.jq-multilang-content').jqmultilang(language);
}
contentTw = "這是一隻可愛的貓娘 名字叫做迷雅 如果喜歡的話可以去FaceBook.Twitter.Pivix...等網站追蹤「榛小豆」老師 即可看到更多充滿魅力的迷雅囉~";
contentEn = "This is a cute cat girl named Mi Ya. If you like it, you can go to FaceBook.Twitter.Pivix...and other websites to follow the teacher「榛小豆」to see more charming Mi Ya."
conentJp = "これはミヤというかわいい猫の女の子です。必要に応じて、FaceBook.Twitter.Pivix ...やその他のウェブサイトにアクセスして、先生の「榛小豆」をフォローして、より魅力的なミヤを見ることができます"