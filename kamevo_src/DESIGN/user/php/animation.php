<script type="text/javascript">
	var num = 50; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.profile-header').addClass('fixedal');
        $('.blockallz').addClass('fixedom');
        $('.groups').addClass('fixedg');
        $('.infos').addClass('fixedg2');
    } else {
        $('.profile-header').removeClass('fixedal');
        $('.blockallz').removeClass('fixedom');
        $('.groups').removeClass('fixedg');
        $('.infos').removeClass('fixedg2');
    }
});
</script>
<style type="text/css">
.fixedal{
	position: fixed;
	width: 1050px;
	margin-top:-47px;
	z-index:999;
}
.fixedom{
	margin-top:220px;
}
.fixedg{
    position: fixed;
    margin-top: 120px;
}
.fixedg2{
    position: fixed;
    right:calc((100% - 1050px) / 2);
    margin-top: 82px;
    z-index: 9998;
}
</style>