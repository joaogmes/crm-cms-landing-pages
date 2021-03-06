<?php
	$url = $_SERVER['REQUEST_URI'];
	$argumentos = explode('/', $url);
	$afiliado = $argumentos[1];
	if(isset($afiliado[1])){
		$base = '../';
	}else{
		$base = './';
		include("seja-um-afiliado.php");
		die();
	}

	$id_afiliado = "SELECT u.id as afiliado, l.id as pagina FROM usuario u, landingpage l WHERE u.lp = l.id AND l.dominio = '".$afiliado."'";
	$stmt_afiliado = $conexao->prepare($id_afiliado);
	$stmt_afiliado->execute();
	$id_afiliado = $stmt_afiliado->fetch(PDO::FETCH_ASSOC);
	
	
	$scripts = "SELECT scripts FROM usuario WHERE id = ".$id_afiliado['afiliado'];
	
	$stmt_scripts = $conexao->prepare($scripts);
	$stmt_scripts->execute();
	$scripts = $stmt_scripts->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<base href="<?=$base?>">
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name='robots' content='noindex, follow' />
<!-- Google Tag Manager for WordPress by gtm4wp.com -->
<script data-cfasync="false" data-pagespeed-no-defer type="text/javascript">//<![CDATA[
var gtm4wp_datalayer_name = "dataLayer";
var dataLayer = dataLayer || [];
//]]>
</script>
<!-- End Google Tag Manager for WordPress by gtm4wp.com -->
<!-- This site is optimized with the Yoast SEO plugin v18.1 - https://yoast.com/wordpress/plugins/seo/ -->
<title><?=$seo['titulo']?></title>
<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?=$seo['titulo']?>" />
<meta property="og:description" content="<?=$seo['descricao']?>"/>
<!-- <meta property="og:url" content="https://www.invencivelprepara.com/d1/" /> -->
<meta property="og:site_name" content="<?=$seo['titulo']?>" />
<!-- <meta property="article:publisher" content="https://www.facebook.com/aprendacincoprofissoes" /> -->
<meta property="article:modified_time" content="2022-02-15T20:27:24+00:00" />
<meta property="og:image" content="<?=$seo['imagem']?>" />
<meta name="twitter:card" content="summary_large_image" />
<link rel=stylesheet type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-utilities.min.css">
<script type="application/ld+json" class="yoast-schema-graph">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://www.invencivelprepara.com/#organization","name":"Invenc??vel Prepara","url":"https://www.invencivelprepara.com/","sameAs":["https://www.facebook.com/aprendacincoprofissoes","https://www.instagram.com/invencivelcursos","https://www.youtube.com/channel/UCXuIyoLdcd8SBU6GH01FRSg/featured"],"logo":{"@type":"ImageObject","@id":"https://www.invencivelprepara.com/#logo","inLanguage":"pt-BR","url":"https://www.invencivelprepara.com/wp-content/uploads/2021/08/INVENCIVEL-prepara-fundo-branco-sem-borda-01-1.png","contentUrl":"https://www.invencivelprepara.com/wp-content/uploads/2021/08/INVENCIVEL-prepara-fundo-branco-sem-borda-01-1.png","width":300,"height":74,"caption":"Invenc??vel Prepara"},"image":{"@id":"https://www.invencivelprepara.com/#logo"}},{"@type":"WebSite","@id":"https://www.invencivelprepara.com/#website","url":"https://www.invencivelprepara.com/","name":"Invenc??vel Prepara","description":"Site criado para ajudar e preparar jovens e adultos para o mercado de trabalho com dicas, artigos e e-books.","publisher":{"@id":"https://www.invencivelprepara.com/#organization"},"potentialAction":[{"@type":"SearchAction","target":{"@type":"EntryPoint","urlTemplate":"https://www.invencivelprepara.com/?s={search_term_string}"},"query-input":"required name=search_term_string"}],"inLanguage":"pt-BR"},{"@type":"ImageObject","@id":"https://www.invencivelprepara.com/d1/#primaryimage","inLanguage":"pt-BR","url":"https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO.png","contentUrl":"https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO.png","width":4045,"height":886},{"@type":"WebPage","@id":"https://www.invencivelprepara.com/d1/#webpage","url":"https://www.invencivelprepara.com/d1/","name":"ESTRUTURA PROPRIA GERAL NO DIRETO - Invenc??vel Prepara","isPartOf":{"@id":"https://www.invencivelprepara.com/#website"},"primaryImageOfPage":{"@id":"https://www.invencivelprepara.com/d1/#primaryimage"},"datePublished":"2022-01-28T15:39:58+00:00","dateModified":"2022-02-15T20:27:24+00:00","breadcrumb":{"@id":"https://www.invencivelprepara.com/d1/#breadcrumb"},"inLanguage":"pt-BR","potentialAction":[{"@type":"ReadAction","target":["https://www.invencivelprepara.com/d1/"]}]},{"@type":"BreadcrumbList","@id":"https://www.invencivelprepara.com/d1/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"In??cio","item":"https://www.invencivelprepara.com/"},{"@type":"ListItem","position":2,"name":"ESTRUTURA PROPRIA GERAL NO DIRETO"}]}]}</script>
<!-- / Yoast SEO plugin. -->
<link rel='dns-prefetch' href='//www.googletagmanager.com' />
<link rel='dns-prefetch' href='//s.w.org' />
<link rel="alternate" type="application/rss+xml" title="Feed para Invenc??vel Prepara ??" href="https://www.invencivelprepara.com/feed/" />
<link rel="alternate" type="application/rss+xml" title="Feed de coment??rios para Invenc??vel Prepara ??" href="https://www.invencivelprepara.com/comments/feed/" />
<link rel="alternate" type="application/rss+xml" title="Feed de coment??rios para Invenc??vel Prepara ?? ESTRUTURA PROPRIA GERAL NO DIRETO" href="https://www.invencivelprepara.com/d1/feed/" />
<script>
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/www.invencivelprepara.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.9.2"}};
/*! This file is auto-generated */
!function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode;p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0);e=i.toDataURL();return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(!p||!p.fillText)return!1;switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([10084,65039,8205,55357,56613],[10084,65039,8203,55357,56613])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(n=t.source||{}).concatemoji?c(n.concatemoji):n.wpemoji&&n.twemoji&&(c(n.twemoji),c(n.wpemoji)))}(window,document,window._wpemojiSettings);
</script>
<style>
img.wp-smiley,
img.emoji {
display: inline !important;
border: none !important;
box-shadow: none !important;
height: 1em !important;
width: 1em !important;
margin: 0 0.07em !important;
vertical-align: -0.1em !important;
background: none !important;
padding: 0 !important;
}
</style>
<link rel='stylesheet' id='wp-block-library-css'  href='https://www.invencivelprepara.com/wp-includes/css/dist/block-library/style.min.css?ver=5.9.2' media='all' />
<style id='wp-block-library-theme-inline-css'>
.wp-block-audio figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-audio figcaption{color:hsla(0,0%,100%,.65)}.wp-block-code>code{font-family:Menlo,Consolas,monaco,monospace;color:#1e1e1e;padding:.8em 1em;border:1px solid #ddd;border-radius:4px}.wp-block-embed figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-embed figcaption{color:hsla(0,0%,100%,.65)}.blocks-gallery-caption{color:#555;font-size:13px;text-align:center}.is-dark-theme .blocks-gallery-caption{color:hsla(0,0%,100%,.65)}.wp-block-image figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-image figcaption{color:hsla(0,0%,100%,.65)}.wp-block-pullquote{border-top:4px solid;border-bottom:4px solid;margin-bottom:1.75em;color:currentColor}.wp-block-pullquote__citation,.wp-block-pullquote cite,.wp-block-pullquote footer{color:currentColor;text-transform:uppercase;font-size:.8125em;font-style:normal}.wp-block-quote{border-left:.25em solid;margin:0 0 1.75em;padding-left:1em}.wp-block-quote cite,.wp-block-quote footer{color:currentColor;font-size:.8125em;position:relative;font-style:normal}.wp-block-quote.has-text-align-right{border-left:none;border-right:.25em solid;padding-left:0;padding-right:1em}.wp-block-quote.has-text-align-center{border:none;padding-left:0}.wp-block-quote.is-large,.wp-block-quote.is-style-large,.wp-block-quote.is-style-plain{border:none}.wp-block-search .wp-block-search__label{font-weight:700}.wp-block-group:where(.has-background){padding:1.25em 2.375em}.wp-block-separator{border:none;border-bottom:2px solid;margin-left:auto;margin-right:auto;opacity:.4}.wp-block-separator:not(.is-style-wide):not(.is-style-dots){width:100px}.wp-block-separator.has-background:not(.is-style-dots){border-bottom:none;height:1px}.wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots){height:2px}.wp-block-table thead{border-bottom:3px solid}.wp-block-table tfoot{border-top:3px solid}.wp-block-table td,.wp-block-table th{padding:.5em;border:1px solid;word-break:normal}.wp-block-table figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-table figcaption{color:hsla(0,0%,100%,.65)}.wp-block-video figcaption{color:#555;font-size:13px;text-align:center}.is-dark-theme .wp-block-video figcaption{color:hsla(0,0%,100%,.65)}.wp-block-template-part.has-background{padding:1.25em 2.375em;margin-top:0;margin-bottom:0}
</style>
<style id='global-styles-inline-css'>
body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #FFF;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--color--primary: #0073a8;--wp--preset--color--secondary: #005075;--wp--preset--color--dark-gray: #111;--wp--preset--color--light-gray: #767676;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');--wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');--wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');--wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');--wp--preset--duotone--midnight: url('#wp-duotone-midnight');--wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');--wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');--wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');--wp--preset--font-size--small: 19.5px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36.5px;--wp--preset--font-size--x-large: 42px;--wp--preset--font-size--normal: 22px;--wp--preset--font-size--huge: 49.5px;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
</style>
<link rel='stylesheet' id='twentynineteen-style-css'  href='https://www.invencivelprepara.com/wp-content/themes/twentynineteen/style.css?ver=2.0' media='all' />
<link rel='stylesheet' id='twentynineteen-print-style-css'  href='https://www.invencivelprepara.com/wp-content/themes/twentynineteen/print.css?ver=2.0' media='print' />
<link rel='stylesheet' id='elementor-icons-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.14.0' media='all' />
<link rel='stylesheet' id='elementor-frontend-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=3.5.5' media='all' />
<link rel='stylesheet' id='elementor-post-10-css'  href='https://www.invencivelprepara.com/wp-content/uploads/elementor/css/post-10.css?ver=1645593055' media='all' />
<link rel='stylesheet' id='elementor-pro-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor-pro/assets/css/frontend.min.css?ver=3.2.1' media='all' />
<link rel='stylesheet' id='font-awesome-5-all-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min.css?ver=5.0.7' media='all' />
<link rel='stylesheet' id='font-awesome-4-shim-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min.css?ver=5.0.7' media='all' />
<link rel='stylesheet' id='elementor-global-css'  href='https://www.invencivelprepara.com/wp-content/uploads/elementor/css/global.css?ver=1644894054' media='all' />
<link rel='stylesheet' id='elementor-post-5517-css'  href='https://www.invencivelprepara.com/wp-content/uploads/elementor/css/post-5517.css?ver=1644956847' media='all' />
<link rel='stylesheet' id='elementor-post-4930-css'  href='https://www.invencivelprepara.com/wp-content/uploads/elementor/css/post-4930.css?ver=1644895285' media='all' />
<link rel='stylesheet' id='google-fonts-1-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7COpen+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&display=auto&ver=5.9.2' media='all' />
<link rel='stylesheet' id='elementor-icons-shared-0-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-solid-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-brands-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.15.3' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-regular-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/regular.min.css?ver=5.15.3' media='all' />
<script src='https://www.invencivelprepara.com/wp-includes/js/jquery/jquery.min.js?ver=3.6.0' id='jquery-core-js'></script>
<script src='https://www.invencivelprepara.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/font-awesome/js/v4-shims.min.js?ver=5.0.7' id='font-awesome-4-shim-js'></script>
<script src='https://www.googletagmanager.com/gtag/js?id=UA-194227367-1' id='google_gtagjs-js' async></script>
<script id='google_gtagjs-js-after'>
window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}
gtag('set', 'linker', {"domains":["www.invencivelprepara.com"]} );
gtag("js", new Date());
gtag("set", "developer_id.dZTNiMT", true);
gtag("config", "UA-194227367-1", {"anonymize_ip":true});
gtag("config", "G-KGKBMRJ7NT");
</script>
<link rel="https://api.w.org/" href="https://www.invencivelprepara.com/wp-json/" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.invencivelprepara.com/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://www.invencivelprepara.com/wp-includes/wlwmanifest.xml" />
<meta name="generator" content="WordPress 5.9.2" />
<link rel='shortlink' href='https://www.invencivelprepara.com/?p=5517' />
<link rel="alternate" type="application/json+oembed" href="https://www.invencivelprepara.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.invencivelprepara.com%2Fd1%2F" />
<link rel="alternate" type="text/xml+oembed" href="https://www.invencivelprepara.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.invencivelprepara.com%2Fd1%2F&format=xml" />
<meta name="generator" content="Site Kit by Google 1.39.0" /><!-- HFCM by 99

Robots - Snippet # 1: Pixel Facebook -->
<script type="text/javascript">
	<?=$scripts['scripts']?>
</script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '213085030625973');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=213085030625973&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- /end HFCM by 99 Robots -->
<!-- HFCM by 99 Robots - Snippet # 2: Verifica????o de dom??nio Facebook -->
<meta name="facebook-domain-verification" content="wpsx3eed4kz6v0nkwx5qqt1pk6p165" />
<!-- /end HFCM by 99 Robots -->
<!-- Google Tag Manager for WordPress by gtm4wp.com -->
<script data-cfasync="false" data-pagespeed-no-defer type="text/javascript">//<![CDATA[
var dataLayer_content = {"pagePostType":"e-landing-page","pagePostType2":"single-e-landing-page","pagePostAuthor":"Ag??ncia Jota Gomes"};
dataLayer.push( dataLayer_content );//]]>
</script>
<script data-cfasync="false">//<![CDATA[
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.'+'js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-57HFHQD');//]]>
</script>
<!-- End Google Tag Manager -->
<!-- End Google Tag Manager for WordPress by gtm4wp.com -->
<!-- AQUI V??O OS SCRIPTS -->

<link rel="pingback" href="https://www.invencivelprepara.com/xmlrpc.php"><style>.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style><link rel="icon" href="https://www.invencivelprepara.com/wp-content/uploads/2021/05/cropped-cropped-3dfbfaeb2d31de36155300b639ac7815-32x32.png" sizes="32x32" />
<link rel="icon" href="https://www.invencivelprepara.com/wp-content/uploads/2021/05/cropped-cropped-3dfbfaeb2d31de36155300b639ac7815-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon" href="https://www.invencivelprepara.com/wp-content/uploads/2021/05/cropped-cropped-3dfbfaeb2d31de36155300b639ac7815-180x180.png" />
<meta name="msapplication-TileImage" content="https://www.invencivelprepara.com/wp-content/uploads/2021/05/cropped-cropped-3dfbfaeb2d31de36155300b639ac7815-270x270.png" />
<style id="wp-custom-css">
.azul{
color: #03235C;
}
.laranja{
color: #ff6600;
}
.negrito{
font-weight: bold;
}
.italico{
font-style:italic;
}
.sombreado .elementor-icon{
box-shadow: #222 1px 1px 10px !important;
}
.small{
font-size: 0.8rem;
}
.cria-form input{
font-family: Roboto;
font-weight: 300;
width:100%;
border-radius:5px;
margin-bottom: 0.5rem
}
.cria-form button{
width:100%;
background-color: #f60;
}
.ctc_cta{
color: #fff9f9 !important;
font-size: 15px !important;
line-height: 28px !important;
font-family: montserrat !important;
font-weight: bold !important;
}
.cursos .elementor-post__read-more{
display:block;
width:100%;
background:#f60;
padding:0.8em;
border-radius:5px;
}
@media (min-width: 600px)
{
.cursos .elementor-grid-item.post{
/* 	flex: 1;
align-self: flex-end; */
}
.cursos .elementor-post__excerpt{
height: 9em;
/* 	border:solid 1px; */
}
.cursos .elementor-post__title{
height:7em;
/* 	border:solid 1px; */
}
}
.cursos2 .elementor-post__read-more{
display:block;
width:100%;
background:#ff6600;
padding:0.8em;
border-radius:5px;
}
@media (min-width: 600px)
{
.cursos2 .elementor-grid-item.post{
/* 	flex: 1;
align-self: flex-end; */
}
.cursos2 .elementor-post__excerpt{
height: 8em;
/* 	border:solid 1px; */
}
.cursos2 .elementor-post__title{
height:3em;
/* 	border:solid 1px; */
}
}
b{
font-weight: 600 !important;
}
.imagem-cursos{
background:#fff;

}
.imagem-cursos img{
border-radius: 10px 10px 0px 0px !important;
}
.imagem-cursos h3 {
margin:0px 15px 0 15px !important;
/* 	height: 4rem; */
}
.imagem-cursos p{
margin:10px 15px 0px 15px !important;
text-align:left !important;
/* 	height:6rem; */
}
@media only screen and (min-width: 800px){

.imagem-cursos{
height:19rem;
}

.imagem-cursos h3 {
height: 2rem;
}
.imagem-cursos p{
height:4.5rem;
margin:0;
padding:0;
}

}		</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" /></head>
<body data-rsssl=1 class="e-landing-page-template e-landing-page-template-elementor_canvas single single-e-landing-page postid-5517 single-format-standard wp-custom-logo wp-embed-responsive singular image-filters-enabled elementor-default elementor-template-canvas elementor-kit-10 elementor-page elementor-page-5517">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-dark-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0.49803921568627" /><feFuncG type="table" tableValues="0 0.49803921568627" /><feFuncB type="table" tableValues="0 0.49803921568627" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.54901960784314 0.98823529411765" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.71764705882353 0.25490196078431" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-red"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 0.27843137254902" /><feFuncB type="table" tableValues="0.5921568627451 0.27843137254902" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-midnight"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0" /><feFuncG type="table" tableValues="0 0.64705882352941" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-magenta-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.78039215686275 1" /><feFuncG type="table" tableValues="0 0.94901960784314" /><feFuncB type="table" tableValues="0.35294117647059 0.47058823529412" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-green"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.65098039215686 0.40392156862745" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.44705882352941 0.4" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-orange"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.098039215686275 1" /><feFuncG type="table" tableValues="0 0.66274509803922" /><feFuncB type="table" tableValues="0.84705882352941 0.41960784313725" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg>		<div data-elementor-type="landing-page" data-elementor-id="5517" class="elementor elementor-5517" data-elementor-settings="[]">
<div class="elementor-section-wrap">
<section class="elementor-section elementor-top-section elementor-element elementor-element-f81f887 custom elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="f81f887" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4749d8f" data-id="4749d8f" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-6093c9c elementor-widget elementor-widget-html" data-id="6093c9c" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<style>
h1, h2, h3, h4, h5, h6, p, span, a, button, li{
font-family: "Open Sans", Sans-serif !important;
}
</style>
<script>
jQuery(document).ready(function($){
var cidade = getUrlParameter('cidade');
if (typeof cidade !== 'undefined') {
if(cidade!==''){
var cidade2 = cidade.replace("+", " ");
var texto="para "+cidade2;
$("#cidade").html(texto);
}
}
})
var getUrlParameter = function getUrlParameter(sParam) {
var sPageURL = window.location.search.substring(1),
sURLVariables = sPageURL.split('&'),
sParameterName,
i;
for (i = 0; i < sURLVariables.length; i++) {
sParameterName = sURLVariables[i].split('=');
if (sParameterName[0] === sParam) {
return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
}
}
};
</script>		</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-1ac8edc elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1ac8edc" data-element_type="section" data-settings="{"background_background":"classic"}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9af75bf" data-id="9af75bf" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-ae166a5 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="ae166a5" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-26fa0a2" data-id="26fa0a2" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-1523593 elementor-widget elementor-widget-image" data-id="1523593" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img width="640" height="140" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO-1024x224.png" class="attachment-large size-large" alt="" loading="lazy" srcset="https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO-1024x224.png 1024w, https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO-300x66.png 300w, https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO-768x168.png 768w, https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO-1536x336.png 1536w, https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO-2048x449.png 2048w, https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO-1568x343.png 1568w" sizes="(max-width: 640px) 100vw, 640px" />															</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-67f6c0a" data-id="67f6c0a" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-a48537a elementor-nav-menu__align-right elementor-nav-menu--dropdown-mobile elementor-nav-menu--stretch elementor-nav-menu--indicator-classic elementor-nav-menu__text-align-aside elementor-nav-menu--toggle elementor-nav-menu--burger elementor-widget elementor-widget-nav-menu" data-id="a48537a" data-element_type="widget" data-settings="{"full_width":"stretch","layout":"horizontal","toggle":"burger"}" data-widget_type="nav-menu.default">
<div class="elementor-widget-container">
<nav role="navigation" class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-horizontal e--pointer-none"><ul id="menu-1-a48537a" class="elementor-nav-menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3949"><a href="<?=$afiliado?>/#cursos" class="elementor-item elementor-item-anchor">Cursos</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3950"><a href="#conteudo" class="elementor-item elementor-item-anchor">Conte??do</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3951"><a href="<?=$afiliado?>/#depoimentos" class="elementor-item elementor-item-anchor">Depoimentos</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3952"><a href="#certificado" class="elementor-item elementor-item-anchor">Certificado</a></li>
</ul></nav>
<div class="elementor-menu-toggle" role="button" tabindex="0" aria-label="Menu Toggle" aria-expanded="false">
<i class="eicon-menu-bar fa-solid fa-bars" aria-hidden="true"></i>
<span class="elementor-screen-only">Menu</span>
</div>
<nav class="elementor-nav-menu--dropdown elementor-nav-menu__container" role="navigation" aria-hidden="true"><ul id="menu-2-a48537a" class="elementor-nav-menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3949"><a href="<?=$afiliado?>/#cursos" class="elementor-item elementor-item-anchor">Cursos</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3950"><a href="#conteudo" class="elementor-item elementor-item-anchor">Conte??do</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3951"><a href="<?=$afiliado?>/#depoimentos" class="elementor-item elementor-item-anchor">Depoimentos</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3952"><a href="#certificado" class="elementor-item elementor-item-anchor">Certificado</a></li>
</ul></nav>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-7d910d8 overflow-hidden elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7d910d8" data-element_type="section" data-settings="{"background_background":"classic","stretch_section":"section-stretched"}">
<div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d1394ae" data-id="d1394ae" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-2600751 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="2600751" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-98107ed" data-id="98107ed" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-d2ac3cd elementor-widget elementor-widget-heading" data-id="d2ac3cd" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">??ltimas vagas dispon??veis <span id="cidade"></span></h2>		</div>
</div>
<div class="elementor-element elementor-element-c4efe91 elementor-widget elementor-widget-heading" data-id="c4efe91" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Quer um bom Emprego e um ??timo sal??rio? Fa??a nossos cursos online sem Mensalidades <br><span style="color:#00A859">Certificado Reconhecido em todo o Brasil.</span>
</h2>		</div>
</div>
<div class="elementor-element elementor-element-6ac730f elementor-widget elementor-widget-text-editor" data-id="6ac730f" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
N??o pague mensalidades. Apostilas e certificado gr??tis.
Apenas 1 taxa ??nica de matr??cula.
Tenha seu certificado em 7 dias.
</div>
</div>
<div class="elementor-element elementor-element-90f5c00 elementor-align-justify elementor-invisible elementor-widget elementor-widget-button" data-id="90f5c00" data-element_type="widget" data-settings="{"_animation":"headShake"}" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="<?=$afiliado?>/#cursos" class="elementor-button-link elementor-button elementor-size-xl elementor-animation-pulse" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">QUERO ESCOLHER MEU CURSO AGORA!</span>

</span>
</a>
</div>
</div>
</div>
<div class="elementor-element elementor-element-4a12b12 elementor-position-left elementor-vertical-align-middle elementor-view-default elementor-widget elementor-widget-icon-box" data-id="4a12b12" data-element_type="widget" data-widget_type="icon-box.default">
<div class="elementor-widget-container">
<div class="elementor-icon-box-wrapper">
<div class="elementor-icon-box-icon">
<span class="elementor-icon elementor-animation-" >
<i aria-hidden="true" class="fas fa-lock"></i>				</span>
</div>
<div class="elementor-icon-box-content">
<h3 class="elementor-icon-box-title">
<span  >
Site 100% seguro					</span>
</h3>
<p class="elementor-icon-box-description">
Seus dados protegidos					</p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-9190f27" data-id="9190f27" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-3c07718 elementor-widget elementor-widget-heading" data-id="3c07718" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h1 class="elementor-heading-title elementor-size-default"><span id="teste" ></span></h1>		</div>
</div>
<div class="elementor-element elementor-element-d7699cb elementor-widget elementor-widget-html" data-id="d7699cb" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<iframe width="560" height="315" src="https://www.youtube.com/embed/hi7gffVtQOA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		</div>
</div>
<div class="elementor-element elementor-element-38c2fee elementor-widget elementor-widget-text-editor" data-id="38c2fee" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p><strong>Seja contratado mesmo sem experi??ncia.</strong><br /><strong><span style="color: #008000;">Conquiste </span>uma vaga de <span style="color: #008000;">emprego</span> em at?? 30 dias.</strong></p>						</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-a640ace elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a640ace" data-element_type="section" id="cursos" data-settings="{"background_background":"classic"}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4c1d58e" data-id="4c1d58e" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-db90281 elementor-widget elementor-widget-text-editor" data-id="db90281" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<h3><em>Conhe??a os cursos online que ir??o te ajudar a conquistar seu emprego de forma mais r??pida!
</em></h3>						</div>
</div>
<div class="elementor-element elementor-element-c7142dd elementor-widget elementor-widget-text-editor" data-id="c7142dd" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<h3><strong>Pague apenas a taxa de inscri????o, a partir de R$ 29,90*</strong></h3>						</div>
</div>
<div class="elementor-element elementor-element-4a333f3 elementor-widget elementor-widget-text-editor" data-id="4a333f3" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p>*Taxa de inscri????o pode variar dependendo do curso escolhido.</p><p>*S?? escolher o curso e clicar em Saiba Mais.</p>						</div>
</div>
<!-- LINHA DE CURSOS -->
<section class="elementor-section elementor-inner-section elementor-element elementor-element-bf389b3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bf389b3" data-element_type="section">

	<!-- ??N??CIO DO CURSO -->
	<?php
		$linha = '<div class="elementor-container elementor-column-gap-default">';
		$i=1;
		foreach ($produtos as $curso) {
			if($i % 4 == 1){
				echo $linha;
			}
			$mensagem = $curso['resumo'];
			$mensagem = str_replace(" ", "%20", $mensagem);
			$whatsapp = "5517996476427";
			$link = "./whatsapp.php?a=".$id_afiliado['afiliado']."&c=".$curso['id'];
	?>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-339c3b4" data-id="339c3b4" data-element_type="column" data-settings="{"background_background":"classic"}">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-9ab8c02 imagem-cursos elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="9ab8c02" data-element_type="widget" data-widget_type="image-box.default">
<div class="elementor-widget-container">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="1080" height="1080" src="./gerenciamento/uploads/<?=$curso['imagem']?>" class="attachment-full size-full" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><h3 class="elementor-image-box-title"><?=strtoupper($curso['nome'])?></h3><p class="elementor-image-box-description"><?=$curso['descricao']?></p></div></div>		</div>
</div>
<div class="elementor-element elementor-element-802ffa5 elementor-align-justify domainaff elementor-widget elementor-widget-button" data-id="802ffa5" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="<?=$link?>" target="_blank" class="elementor-button-link elementor-button elementor-size-md" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Saiba mais</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
<?php
if($i % 4 == 0){
	echo "</div>";
}
$i++;
}
	?>
<!-- FINAL DO CURSO -->
</div>
</section>
<!-- FINAL DA LINHA -->
</div>
</div>
<!-- </div> -->
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-d4d4933 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="d4d4933" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ce27928" data-id="ce27928" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-87282f3 elementor-widget elementor-widget-heading" data-id="87282f3" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-small">Fa??a sua inscri????o agora e garanta a sua vaga.</h2>		</div>
</div>
<div class="elementor-element elementor-element-c71d4f1 elementor-widget elementor-widget-heading" data-id="c71d4f1" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Ganhe R$ 315,00 em Brindes. Dispon??vel no Plano Completo de cada Curso.</h2>		</div>
</div>
<div class="elementor-element elementor-element-23b9f35 elementor-hidden-desktop elementor-hidden-tablet elementor-widget elementor-widget-heading" data-id="23b9f35" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">(arraste para o lado)</h2>		</div>
</div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-bea794b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bea794b" data-element_type="section" data-settings="{"background_background":"gradient"}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-57bdfbb" data-id="57bdfbb" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-a923ee8 elementor-arrows-position-outside elementor-pagination-position-outside elementor-widget elementor-widget-image-carousel" data-id="a923ee8" data-element_type="widget" data-settings="{"slides_to_show":"5","autoplay":"no","infinite":"no","image_spacing_custom":{"unit":"px","size":30,"sizes":[]},"navigation":"both","speed":500}" data-widget_type="image-carousel.default">
<div class="elementor-widget-container">
<div class="elementor-image-carousel-wrapper swiper-container" dir="ltr">
<div class="elementor-image-carousel swiper-wrapper">
<div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/09/Superar-desafios.jpg" alt="Brinde #1Curso Intelig??ncia Emocional  De R$ 59,00 por R$ 0,00" /><figcaption class="elementor-image-carousel-caption"><strong>Brinde #1</strong><br>Curso Intelig??ncia Emocional<br><span class="small">  De <strike>R$ 59,00</strike> por R$ 0,00</figcaption></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/09/Financas-pessoais.jpg" alt="Brinde #2Curso Finan??as Pessoais  De R$ 59,00 por R$ 0,00" /><figcaption class="elementor-image-carousel-caption"><strong>Brinde #2</strong><br>Curso Finan??as Pessoais<br><span class="small">  De <strike>R$ 59,00</strike> por R$ 0,00</figcaption></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/09/COMUNICACAO.jpg" alt="Brinde #3Curso Comunica????o Interpessoal  De R$ 59,00 por R$ 0,00" /><figcaption class="elementor-image-carousel-caption"><strong>Brinde #3</strong><br>Curso Comunica????o Interpessoal<br><span class="small">  De <strike>R$ 59,00</strike> por R$ 0,00</figcaption></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/Design-sem-nome-7.png" alt="Brinde #4Windows 10  De R$ 79,00 por R$ 0,00" /><figcaption class="elementor-image-carousel-caption"><strong>Brinde #4</strong><br>Windows 10<br><span class="small">  De <strike>R$ 79,00</strike> por R$ 0,00</figcaption></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-14-at-10.16.08.jpeg" alt="Brinde #5Curso Atendimento ao Cliente De R$ 59,00 por R$ 0,00" /><figcaption class="elementor-image-carousel-caption"><strong>Brinde #5</strong><br>Curso Atendimento ao Cliente<br><span class="small">  De <strike>R$ 59,00</strike> por R$ 0,00</figcaption></figure></div>			</div>
<div class="swiper-pagination"></div>
<div class="elementor-swiper-button elementor-swiper-button-prev">
<i aria-hidden="true" class="eicon-chevron-left"></i>						<span class="elementor-screen-only">Anterior</span>
</div>
<div class="elementor-swiper-button elementor-swiper-button-next">
<i aria-hidden="true" class="eicon-chevron-right"></i>						<span class="elementor-screen-only">Pr??ximo</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-a5f568c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a5f568c" data-element_type="section" id="certificado" data-settings="{"background_background":"classic","shape_divider_top":"pyramids","shape_divider_bottom":"pyramids","shape_divider_bottom_negative":"yes"}">
<div class="elementor-background-overlay"></div>
<div class="elementor-shape elementor-shape-top" data-negative="false">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
<path class="elementor-shape-fill" d="M761.9,44.1L643.1,27.2L333.8,98L0,3.8V0l1000,0v3.9"/>
</svg>		</div>
<div class="elementor-shape elementor-shape-bottom" data-negative="true">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
<path class="elementor-shape-fill" d="M761.9,40.6L643.1,24L333.9,93.8L0.1,1H0v99h1000V1"/>
</svg>		</div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-51ce2ff" data-id="51ce2ff" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-922a18c elementor-widget elementor-widget-heading" data-id="922a18c" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Para Cada Curso Conclu??do<br>
Voc?? Receber?? um Certificado.</h2>		</div>
</div>
<div class="elementor-element elementor-element-d0a5302 elementor-widget elementor-widget-heading" data-id="d0a5302" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Autorizado pelo MEC e sem custo adicional.</h2>		</div>
</div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-30014ae elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default" data-id="30014ae" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6d9a611" data-id="6d9a611" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-958e6b9 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="958e6b9" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items">
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i>						</span>
<span class="elementor-icon-list-text">Enrique??a seu curr??culo, e aumente as chances de conseguir um bom emprego.</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i>						</span>
<span class="elementor-icon-list-text">Conquiste promo????es internas nas empresas, pois voc?? ir?? se capacitar e aumentar as chances de ocupar um cargo melhor.</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i>						</span>
<span class="elementor-icon-list-text">V??lido como Extens??o Universit??ria (horas complementares, atividades extracurriculares).</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i>						</span>
<span class="elementor-icon-list-text">Autorizado pelo MEC. Reconhecido em Todo o Brasil.</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i>						</span>
<span class="elementor-icon-list-text">Tem a Mesma validade de um Curso Presencial.</span>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2d6d57a" data-id="2d6d57a" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-3f01d50 elementor-widget elementor-widget-image" data-id="3f01d50" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img width="640" height="459" src="https://www.invencivelprepara.com/wp-content/uploads/2022/01/WhatsApp-Image-2022-01-26-at-09.22.17-1024x735.jpeg" class="attachment-large size-large" alt="" loading="lazy" srcset="https://www.invencivelprepara.com/wp-content/uploads/2022/01/WhatsApp-Image-2022-01-26-at-09.22.17-1024x735.jpeg 1024w, https://www.invencivelprepara.com/wp-content/uploads/2022/01/WhatsApp-Image-2022-01-26-at-09.22.17-300x215.jpeg 300w, https://www.invencivelprepara.com/wp-content/uploads/2022/01/WhatsApp-Image-2022-01-26-at-09.22.17-768x551.jpeg 768w, https://www.invencivelprepara.com/wp-content/uploads/2022/01/WhatsApp-Image-2022-01-26-at-09.22.17.jpeg 1280w" sizes="(max-width: 640px) 100vw, 640px" />															</div>
</div>
</div>
</div>
</div>
</section>
<div class="elementor-element elementor-element-3a9ec25 elementor-align-center elementor-invisible elementor-widget elementor-widget-button" data-id="3a9ec25" data-element_type="widget" data-settings="{"_animation":"headShake"}" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="<?=$afiliado?>/#cursos" class="elementor-button-link elementor-button elementor-size-xl elementor-animation-pulse" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Fazer minha inscri????o!</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-3e5d9ac elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3e5d9ac" data-element_type="section" data-settings="{"background_background":"classic"}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c264c59" data-id="c264c59" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-80a7a4f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="80a7a4f" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-ee7b315" data-id="ee7b315" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-ca790d4 elementor-widget elementor-widget-text-editor" data-id="ca790d4" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<em>Com nossos Cursos e Certificados voc?? ter?? v??rias oportunidades de Trabalho e estar?? capacitado para:
</em>						</div>
</div>
<div class="elementor-element elementor-element-f1eed9a elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-id="f1eed9a" data-element_type="widget" data-widget_type="image-box.default">
<div class="elementor-widget-container">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="64" height="64" src="https://www.invencivelprepara.com/wp-content/uploads/2021/07/support.png" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><p class="elementor-image-box-description">Trabalhar em lojas, shopping, montar seu pr??prio neg??cio, farm??cias, supermercados, com??rcio, ind??strias, restaurantes, institui????es de ensino, escrit??rios, lot??ricas, bancos, garagens, hot??is, material de constru????o, etc.</p></div></div>		</div>
</div>
<div class="elementor-element elementor-element-904c0f5 elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-id="904c0f5" data-element_type="widget" data-widget_type="image-box.default">
<div class="elementor-widget-container">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="64" height="64" src="https://www.invencivelprepara.com/wp-content/uploads/2021/07/customer-service.png" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><p class="elementor-image-box-description">E ainda poder?? atuar em v??rios setores de uma empresa como: Departamento Financeiro, Setor de Vendas, RH, Marketing, Administra????o, Departamento Pessoal, Contabilidade, Expedi????o, entre outros.</p></div></div>		</div>
</div>
<div class="elementor-element elementor-element-54fa946 elementor-position-left elementor-vertical-align-middle elementor-widget elementor-widget-image-box" data-id="54fa946" data-element_type="widget" data-widget_type="image-box.default">
<div class="elementor-widget-container">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="150" height="150" src="https://www.invencivelprepara.com/wp-content/uploads/2021/08/experiencia-de-usuario-150x150.png" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><p class="elementor-image-box-title">M??todo Conquista de Emprego</p><p class="elementor-image-box-description">Voc?? aprender?? um m??todo e um projeto que far?? voc?? desenvolver qualidades que as empresas buscam. Iremos te mostrar o passo a passo que dever?? seguir at?? conseguir seu t??o sonhado emprego. <br>**Dispon??vel apenas para alguns cursos. Verificar.**</p></div></div>		</div>
</div>
<div class="elementor-element elementor-element-4393830 elementor-align-center elementor-invisible elementor-widget elementor-widget-button" data-id="4393830" data-element_type="widget" data-settings="{"_animation":"headShake"}" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="<?=$afiliado?>/#cursos" class="elementor-button-link elementor-button elementor-size-xl elementor-animation-pulse" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Quero escolher meu curso agora!</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-2aecd3a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2aecd3a" data-element_type="section" data-settings="{"background_background":"classic"}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7b6b1ed" data-id="7b6b1ed" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-64c9de6 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="64c9de6" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-17f1bc1" data-id="17f1bc1" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-69d55c3 elementor-widget elementor-widget-text-editor" data-id="69d55c3" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<h3><strong>SOBRE O PROGRAMA EMPREGA MAIS BRASIL:</strong></h3><p>O Programa tem o objetivo de aumentar o n??mero de brasileiros com qualifica????o profissional, oferecendo cursos de qualidade e Sem Mensalidades. O aluno paga apenas 1 taxa ??nica de matr??cula.</p><p>Descubra como conseguir o seu emprego em at?? 30 dias. Siga nosso M??todo e receba o Guia do Emprego R??pido.<br />Pesquisas comprovam que pessoas que adicionam certificados no curr??culo possuem 6x mais chances de ser contratado do que aqueles que n??o possuem.</p><p>Fa??a nossos cursos e tenha um curr??culo que chamar?? a aten????o de qualquer empresa.</p>						</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-dd404b4" data-id="dd404b4" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-85f2546 elementor-widget elementor-widget-image" data-id="85f2546" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img width="640" height="426" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-14-at-10.17.22-1024x682.jpeg" class="attachment-large size-large" alt="" loading="lazy" srcset="https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-14-at-10.17.22-1024x682.jpeg 1024w, https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-14-at-10.17.22-300x200.jpeg 300w, https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-14-at-10.17.22-768x512.jpeg 768w, https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-14-at-10.17.22.jpeg 1280w" sizes="(max-width: 640px) 100vw, 640px" />															</div>
</div>
<div class="elementor-element elementor-element-3269b1f elementor-align-center elementor-invisible elementor-widget elementor-widget-button" data-id="3269b1f" data-element_type="widget" data-settings="{"_animation":"headShake"}" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="<?=$afiliado?>/#cursos" class="elementor-button-link elementor-button elementor-size-xl elementor-animation-pulse" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">QUERO FAZER MINHA MATR??CULA AGORA</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-311d98d elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="311d98d" data-element_type="section" id="depoimentos">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e1de40b" data-id="e1de40b" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-945b6a8 elementor-widget elementor-widget-heading" data-id="945b6a8" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Depoimentos dos<br> alunos</h2>		</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-220e670 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="220e670" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-6baa107" data-id="6baa107" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-8b810b8 elementor-widget elementor-widget-html" data-id="8b810b8" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<iframe loading="lazy" width="560" height="200" src="https://www.youtube.com/embed/ThFtXS0Kd-A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		</div>
</div>
<div class="elementor-element elementor-element-bed070b elementor-widget elementor-widget-html" data-id="bed070b" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<iframe loading="lazy" width="560" height="200" src="https://www.youtube.com/embed/owYQvcR_T7Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-9051034" data-id="9051034" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-ffc699a elementor-widget elementor-widget-html" data-id="ffc699a" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<iframe loading="lazy" width="560" height="200" src="https://www.youtube.com/embed/et81YJiUYh4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		</div>
</div>
<div class="elementor-element elementor-element-0c5a66c elementor-widget elementor-widget-html" data-id="0c5a66c" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<iframe loading="lazy" width="560" height="200" src="https://www.youtube.com/embed/1nqAoKfXClY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-b687968" data-id="b687968" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-72eb079 elementor-widget elementor-widget-html" data-id="72eb079" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<iframe loading="lazy" width="560" height="200" src="https://www.youtube.com/embed/20Kl81DJyJI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		</div>
</div>
<div class="elementor-element elementor-element-6843a55 elementor-widget elementor-widget-html" data-id="6843a55" data-element_type="widget" data-widget_type="html.default">
<div class="elementor-widget-container">
<iframe loading="lazy" width="560" height="200" src="https://www.youtube.com/embed/lG0Oygw815c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-3f907cc elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3f907cc" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-41d269e" data-id="41d269e" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-376f3c9 elementor-arrows-position-outside elementor-pagination-position-outside elementor-widget elementor-widget-image-carousel" data-id="376f3c9" data-element_type="widget" data-settings="{"slides_to_show":"3","slides_to_scroll":"3","speed":600,"navigation":"both","autoplay":"yes","pause_on_hover":"yes","pause_on_interaction":"yes","autoplay_speed":5000,"infinite":"yes","image_spacing_custom":{"unit":"px","size":20,"sizes":[]}}" data-widget_type="image-carousel.default">
<div class="elementor-widget-container">
<div class="elementor-image-carousel-wrapper swiper-container" dir="ltr">
<div class="elementor-image-carousel swiper-wrapper">
<div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-13-at-22.38.32.jpeg" alt="WhatsApp Image 2021-12-13 at 22.38.32" /></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-13-at-22.38.33-1.jpeg" alt="WhatsApp Image 2021-12-13 at 22.38.33 (1)" /></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-13-at-22.38.33-2.jpeg" alt="WhatsApp Image 2021-12-13 at 22.38.33 (2)" /></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-13-at-22.38.33-3.jpeg" alt="WhatsApp Image 2021-12-13 at 22.38.33 (3)" /></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/WhatsApp-Image-2021-12-13-at-22.38.33.jpeg" alt="WhatsApp Image 2021-12-13 at 22.38.33" /></figure></div>			</div>
<div class="swiper-pagination"></div>
<div class="elementor-swiper-button elementor-swiper-button-prev">
<i aria-hidden="true" class="eicon-chevron-left"></i>						<span class="elementor-screen-only">Anterior</span>
</div>
<div class="elementor-swiper-button elementor-swiper-button-next">
<i aria-hidden="true" class="eicon-chevron-right"></i>						<span class="elementor-screen-only">Pr??ximo</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-69d6709 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="69d6709" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7d75400" data-id="7d75400" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-ce29b7b elementor-arrows-position-outside elementor-pagination-position-outside elementor-widget elementor-widget-image-carousel" data-id="ce29b7b" data-element_type="widget" data-settings="{"slides_to_show":"3","slides_to_scroll":"3","speed":600,"navigation":"both","autoplay":"yes","pause_on_hover":"yes","pause_on_interaction":"yes","autoplay_speed":5000,"infinite":"yes","image_spacing_custom":{"unit":"px","size":20,"sizes":[]}}" data-widget_type="image-carousel.default">
<div class="elementor-widget-container">
<div class="elementor-image-carousel-wrapper swiper-container" dir="ltr">
<div class="elementor-image-carousel swiper-wrapper">
<div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2022/01/1.jpg" alt="1" /></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2022/01/2.jpg" alt="2" /></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2022/01/3.jpg" alt="3" /></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2022/01/4.jpg" alt="4" /></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2022/01/5.jpg" alt="5" /></figure></div><div class="swiper-slide"><figure class="swiper-slide-inner"><img class="swiper-slide-image" src="https://www.invencivelprepara.com/wp-content/uploads/2022/01/6.jpg" alt="6" /></figure></div>			</div>
<div class="swiper-pagination"></div>
<div class="elementor-swiper-button elementor-swiper-button-prev">
<i aria-hidden="true" class="eicon-chevron-left"></i>						<span class="elementor-screen-only">Anterior</span>
</div>
<div class="elementor-swiper-button elementor-swiper-button-next">
<i aria-hidden="true" class="eicon-chevron-right"></i>						<span class="elementor-screen-only">Pr??ximo</span>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-5ecd4aa elementor-align-center elementor-invisible elementor-widget elementor-widget-button" data-id="5ecd4aa" data-element_type="widget" data-settings="{"_animation":"headShake"}" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="<?=$afiliado?>/#cursos" class="elementor-button-link elementor-button elementor-size-xl elementor-animation-pulse" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">QUERO FAZER MINHA MATR??CULA AGORA</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-bb2f764 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bb2f764" data-element_type="section" data-settings="{"background_background":"classic"}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0f8e71d" data-id="0f8e71d" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-c9439bd elementor-widget elementor-widget-heading" data-id="c9439bd" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">PERGUNTAS FREQUENTES</h2>		</div>
</div>
<div class="elementor-element elementor-element-dff5843 elementor-widget elementor-widget-accordion" data-id="dff5843" data-element_type="widget" data-widget_type="accordion.default">
<div class="elementor-widget-container">
<div class="elementor-accordion" role="tablist">
<div class="elementor-accordion-item">
<div id="elementor-tab-title-2341" class="elementor-tab-title" data-tab="1" role="tab" aria-controls="elementor-tab-content-2341" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-plus"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
</span>
<a class="elementor-accordion-title" href="">Como irei Acessar o Curso?</a>
</div>
<div id="elementor-tab-content-2341" class="elementor-tab-content elementor-clearfix" data-tab="1" role="tabpanel" aria-labelledby="elementor-tab-title-2341"><ul><li>Enviaremos o link de acesso no seu e-mail, com o login e senha para acessar o Curso.</li><li>Voc?? poder?? acessar o Curso por Computador, Tablet ou Celular.</li><li>O Curso ?? aberto para todos, basta saber ler e escrever.</li><li>Estude onde e quando quiser. S?? ter acesso ?? internet.</li><li>No final do Curso, voc?? mesmo emite seu certificado.</li></ul></div>
</div>
<div class="elementor-accordion-item">
<div id="elementor-tab-title-2342" class="elementor-tab-title" data-tab="2" role="tab" aria-controls="elementor-tab-content-2342" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-plus"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
</span>
<a class="elementor-accordion-title" href="">O Certificado ?? Autorizado pelo MEC?</a>
</div>
<div id="elementor-tab-content-2342" class="elementor-tab-content elementor-clearfix" data-tab="2" role="tabpanel" aria-labelledby="elementor-tab-title-2342"><p>O nosso Certificado ?? autorizado pelo MEC e reconhecido em todo o Brasil e emitido em conformidade com:</p><p>Lei n?? 9.394 ??? Diretrizes e Bases da Educa????o Nacional; Constitui????o Federal ??? Artigo 205; ??? Constitui????o Federal e Artigo 206; Decreto Presidencial n?? 5.154; Normas da Resolu????o CNE n?? 04/99 ??? MEC (art. 7??, ?? 3??)</p><p>Receba seu certificado em at?? 7 dias.<br />Nosso Certificado tem a mesma validade do curso presencial.</p><p>Ao t??rmino do curso, imediatamente voc?? j?? pode solicitar e emitir seu certificado.</p></div>
</div>
<div class="elementor-accordion-item">
<div id="elementor-tab-title-2343" class="elementor-tab-title" data-tab="3" role="tab" aria-controls="elementor-tab-content-2343" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-plus"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
</span>
<a class="elementor-accordion-title" href="">As vagas podem acabar?</a>
</div>
<div id="elementor-tab-content-2343" class="elementor-tab-content elementor-clearfix" data-tab="3" role="tabpanel" aria-labelledby="elementor-tab-title-2343"><p>Sim. Nosso Portal tem um limite de acessos e o Programa Emprega Mais Brasil liberou poucas vagas com as bolsas de estudo de at?? 90% de desconto. As vagas e bolsas de estudo podem acabar a qualquer momento. E n??o podemos garantir vagas para todos, apenas enquanto houver disponibilidade.</p></div>
</div>
<div class="elementor-accordion-item">
<div id="elementor-tab-title-2344" class="elementor-tab-title" data-tab="4" role="tab" aria-controls="elementor-tab-content-2344" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-plus"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
</span>
<a class="elementor-accordion-title" href="">Por que devo fazer Cursos Profissionalizantes?</a>
</div>
<div id="elementor-tab-content-2344" class="elementor-tab-content elementor-clearfix" data-tab="4" role="tabpanel" aria-labelledby="elementor-tab-title-2344"><p>Responda essas 3 perguntas:<br />Voc?? est?? preocupado com o Mercado de Trabalho?<br />Com mais Qualifica????o ?? mais f??cil arrumar um Emprego e ter um sal??rio melhor?<br />Ficar em casa parado sem tomar uma atitude n??o vai resolver a sua vida, concorda?<br />Se voc?? respondeu SIM para qualquer uma dessas perguntas, voc?? precisa tomar uma atitude e realizar o curso que te deixar?? preparado para entrar ou retornar ao mercado de trabalho.</p></div>
</div>
<div class="elementor-accordion-item">
<div id="elementor-tab-title-2345" class="elementor-tab-title" data-tab="5" role="tab" aria-controls="elementor-tab-content-2345" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-plus"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-minus"></i></span>
</span>
<a class="elementor-accordion-title" href="">Terei suporte para realizar o curso?</a>
</div>
<div id="elementor-tab-content-2345" class="elementor-tab-content elementor-clearfix" data-tab="5" role="tabpanel" aria-labelledby="elementor-tab-title-2345"><p>Sim. Sabemos como ?? dif??cil come??ar sozinho, sem ter ningu??m do seu lado pra te ajudar e te dizer que est?? realmente no caminho certo. Sabemos tamb??m como ?? chato fazer parte de grupos em que as pessoas n??o se ajudam.<br />E por isso, pra resolver esse problema, voc?? ter?? acesso a um canal de suporte secreto, s?? para os alunos do Programa Emprega Mais Brasil, onde voc?? vai tirar d??vidas de acesso e receber todas as orienta????es necess??rias para o seu sucesso.<br />O nosso objetivo ?? que voc?? seja o(a) melhor e mais destacado(a) profissional de sua cidade e regi??o.<br />E a??, est?? preparado para esta virada de chave? Fa??a agora um de nossos cursos.</p></div>
</div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-6aa07ef elementor-align-center elementor-invisible elementor-widget elementor-widget-button" data-id="6aa07ef" data-element_type="widget" data-settings="{"_animation":"headShake"}" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="<?=$afiliado?>/#cursos" class="elementor-button-link elementor-button elementor-size-xl elementor-animation-pulse" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Garantir minha vaga agora<br><small>(aperte aqui)</small></span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-3c00b9f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3c00b9f" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-199ef06" data-id="199ef06" data-element_type="column" data-settings="{"background_background":"classic"}">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-e503398 elementor-widget elementor-widget-image" data-id="e503398" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img width="298" height="251" src="https://www.invencivelprepara.com/wp-content/uploads/2021/08/7-dias-garantia.png" class="attachment-full size-full" alt="" loading="lazy" />															</div>
</div>
<div class="elementor-element elementor-element-d4ee725 elementor-widget elementor-widget-heading" data-id="d4ee725" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Satisfa????o Garantida.<br>Compra segura!</h2>		</div>
</div>
<div class="elementor-element elementor-element-5edd7ed elementor-widget elementor-widget-text-editor" data-id="5edd7ed" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<p>A oportunidade est?? na sua frente. Agora s?? depende de voc??. Vamos em frente, voc?? n??o vai se arrepender!</p><p>E para te deixar seguro, te darei algo especial, GARANTIA DE 7 DIAS INCONDICIONAL.</p><p>Se dentro de 7 dias voc?? se arrepender, me mande um e-mail e te devolvo 100% do seu dinheiro sem te contestar uma palavra.</p>						</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-35a5f7b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="35a5f7b" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ef4428d" data-id="ef4428d" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-8a5f1ea elementor-widget elementor-widget-image" data-id="8a5f1ea" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<img width="640" height="80" src="https://www.invencivelprepara.com/wp-content/uploads/2021/07/banner.jpg" class="attachment-large size-large" alt="" loading="lazy" srcset="https://www.invencivelprepara.com/wp-content/uploads/2021/07/banner.jpg 800w, https://www.invencivelprepara.com/wp-content/uploads/2021/07/banner-300x38.jpg 300w, https://www.invencivelprepara.com/wp-content/uploads/2021/07/banner-768x96.jpg 768w" sizes="(max-width: 640px) 100vw, 640px" />															</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-947d5e5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="947d5e5" data-element_type="section" data-settings="{"background_background":"classic"}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0582a54" data-id="0582a54" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-7f2aabd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7f2aabd" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-542b2c5" data-id="542b2c5" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-94fb757 elementor-widget elementor-widget-image" data-id="94fb757" data-element_type="widget" data-widget_type="image.default">
	<div class="elementor-widget-container">
		<img src="https://www.invencivelprepara.com/wp-content/uploads/2021/05/PREPARA-BRANCO-11.png" title="Invencivel Prepara" alt="Invencivel Prepara" />															</div>
	</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-ac8974d" data-id="ac8974d" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
	<div class="elementor-element elementor-element-6cca34a elementor-widget elementor-widget-image" data-id="6cca34a" data-element_type="widget" data-widget_type="image.default">
		<div class="elementor-widget-container">
			<img src="https://www.invencivelprepara.com/wp-content/uploads/2021/07/invencivel-sem-fundo-na-cor-branca.png" title="Invenc??vel Cursos ??? Branco" alt="Invenc??vel Cursos - Branco" />															</div>
		</div>
	</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-96d450a" data-id="96d450a" data-element_type="column">
	<div class="elementor-widget-wrap">
	</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-4673c17" data-id="4673c17" data-element_type="column">
	<div class="elementor-widget-wrap elementor-element-populated">
		<div class="elementor-element elementor-element-a6748ce elementor-shape-square elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons" data-id="a6748ce" data-element_type="widget" data-widget_type="social-icons.default">
			<div class="elementor-widget-container">
				<div class="elementor-social-icons-wrapper elementor-grid">
					<span class="elementor-grid-item">
						<a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-a4683d2" href="https://www.facebook.com/aprendacincoprofissoes" target="_blank">
							<span class="elementor-screen-only">Facebook</span>
							<i class="fab fa-facebook"></i>					</a>
						</span>
						<span class="elementor-grid-item">
							<a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-1676fbf" href="https://www.instagram.com/invencivelcursos" target="_blank">
								<span class="elementor-screen-only">Instagram</span>
								<i class="fab fa-instagram"></i>					</a>
							</span>
							<span class="elementor-grid-item">
								<a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-repeater-item-50c983c" href="https://www.youtube.com/channel/UCo3ABP2TdN7Nc6FUTtrvF1w" target="_blank">
									<span class="elementor-screen-only">Youtube</span>
									<i class="fab fa-youtube"></i>					</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="elementor-element elementor-element-88b16ed elementor-widget elementor-widget-text-editor" data-id="88b16ed" data-element_type="widget" data-widget_type="text-editor.default">
		<div class="elementor-widget-container">
			<p><strong>Amor pelo pr??ximo e paix??o por ajudar e levar conhecimento ?? o que nos motiva a sempre querer melhorar.</strong></p>						</div>
		</div>
		<div class="elementor-element elementor-element-f458a1b elementor-widget elementor-widget-text-editor" data-id="f458a1b" data-element_type="widget" data-widget_type="text-editor.default">
			<div class="elementor-widget-container">
				<p>Invenc??vel Cursos ?? 2022. Todos os direitos reservados.</p>						</div>
			</div>
			<div class="elementor-element elementor-element-95ea29d elementor-widget elementor-widget-text-editor" data-id="95ea29d" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<p>MAZETTI & VALINI LTDA ??? ME | CNPJ: 22.009.594/0001-34 <br />Av. Paulo Saravalli, 956 ??? Fernand??polis/SP | <span class="elementor-icon-list-text">(17) 3442-1711</span></p>						</div>
				</div>
				<div class="elementor-element elementor-element-c928575 elementor-widget elementor-widget-text-editor" data-id="c928575" data-element_type="widget" data-widget_type="text-editor.default">
					<div class="elementor-widget-container">
						*Observa????o: Alguns B??nus e Brindes dispon??veis e entregues ap??s 8 dias do in??cio do curso, atrav??s da solicita????o do aluno.
						*O Grupo Meta, Facebook e Instagram n??o possuem nenhum v??nculo com os produtos anunciados em suas redes sociais.
						<br>Os resultados variam de pessoa para pessoa, seus objetivos e esfor??os. Para conseguir seu emprego em at?? 30 dias ?? necess??rio seguir as orienta????es exatamente como ensinado no M??todo Conquista de Emprego.						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
</div>
</div>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57HFHQD"
height="0" width="0" style="display:none;visibility:hidden" aria-hidden="true"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->		<div data-elementor-type="popup" data-elementor-id="4930" class="elementor elementor-4930 elementor-location-popup" data-elementor-settings="{"triggers":{"page_load":"yes","page_load_delay":0},"timing":[]}">
	<div class="elementor-section-wrap">
		<section class="elementor-section elementor-top-section elementor-element elementor-element-47b79377 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="47b79377" data-element_type="section">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-6eb2ff2b" data-id="6eb2ff2b" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-c6e581f elementor-view-default elementor-widget elementor-widget-icon" data-id="c6e581f" data-element_type="widget" data-widget_type="icon.default">
							<div class="elementor-widget-container">
								<div class="elementor-icon-wrapper">
									<div class="elementor-icon">
										<i aria-hidden="true" class="far fa-bell"></i>			</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-63f98971" data-id="63f98971" data-element_type="column">
						<div class="elementor-widget-wrap elementor-element-populated">
							<div class="elementor-element elementor-element-6f953a3d elementor-widget elementor-widget-heading" data-id="6f953a3d" data-element_type="widget" data-widget_type="heading.default">
								<div class="elementor-widget-container">
									<h2 class="elementor-heading-title elementor-size-default">Esse site utiliza cookies para melhorar sua experi??ncia de uso.</h2>		</div>
								</div>
							</div>
						</div>
						<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-240e9a9" data-id="240e9a9" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-10e65036 elementor-align-justify elementor-widget elementor-widget-button" data-id="10e65036" data-element_type="widget" data-widget_type="button.default">
									<div class="elementor-widget-container">
										<div class="elementor-button-wrapper">
											<a href="#elementor-action%3Aaction%3Dpopup%3Aclose%26settings%3DeyJkb19ub3Rfc2hvd19hZ2FpbiI6IiJ9" class="elementor-button-link elementor-button elementor-size-sm" role="button">
												<span class="elementor-button-content-wrapper">
													<span class="elementor-button-text">Aceitar!</span>
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<link rel='stylesheet' id='e-animations-css'  href='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.5.5' media='all' />
		<script src='https://www.invencivelprepara.com/wp-content/plugins/mask-form-elementor/js/jquery.mask.min.js?ver=1.0' id='jquery.mask.min.js-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/mask-form-elementor/js/maskformelementor.js?ver=1.0' id='maskformelementor.js-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/themes/twentynineteen/js/priority-menu.js?ver=20181214' id='twentynineteen-priority-menu-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/themes/twentynineteen/js/touch-keyboard-navigation.js?ver=20181231' id='twentynineteen-touch-navigation-js'></script>
		<script src='https://www.invencivelprepara.com/wp-includes/js/comment-reply.min.js?ver=5.9.2' id='comment-reply-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/page-links-to/dist/new-tab.js?ver=3.3.5' id='page-links-to-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor-pro/assets/lib/smartmenus/jquery.smartmenus.min.js?ver=1.0.1' id='smartmenus-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor-pro/assets/js/webpack-pro.runtime.min.js?ver=3.2.1' id='elementor-pro-webpack-runtime-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.5.5' id='elementor-webpack-runtime-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.5.5' id='elementor-frontend-modules-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor-pro/assets/lib/sticky/jquery.sticky.min.js?ver=3.2.1' id='elementor-sticky-js'></script>
		<script id='elementor-pro-frontend-js-before'>
			var ElementorProFrontendConfig = {"ajaxurl":"https:\/\/www.invencivelprepara.com\/wp-admin\/admin-ajax.php","nonce":"123f5bdcbb","urls":{"assets":"https:\/\/www.invencivelprepara.com\/wp-content\/plugins\/elementor-pro\/assets\/"},"i18n":{"toc_no_headings_found":"No headings were found on this page."},"shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"google":{"title":"Google+","has_counter":true},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"mix":{"title":"Mix"},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"}},"facebook_sdk":{"lang":"pt_BR","app_id":""},"lottie":{"defaultAnimationUrl":"https:\/\/www.invencivelprepara.com\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"}};
		</script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor-pro/assets/js/frontend.min.js?ver=3.2.1' id='elementor-pro-frontend-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2' id='elementor-waypoints-js'></script>
		<script src='https://www.invencivelprepara.com/wp-includes/js/jquery/ui/core.min.js?ver=1.13.1' id='jquery-ui-core-js'></script>
		<script id='elementor-frontend-js-before'>
			var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Compartilhar no Facebook","shareOnTwitter":"Compartilhar no Twitter","pinIt":"Fixar","download":"Baixar","downloadImage":"Baixar imagem","fullscreen":"Tela cheia","zoom":"Zoom","share":"Compartilhar","playVideo":"Reproduzir v\u00eddeo","previous":"Anterior","next":"Pr\u00f3ximo","close":"Fechar"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Celular","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Celular extra","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet extra","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.5.5","is_static":false,"experimentalFeatures":{"e_dom_optimization":true,"e_optimized_assets_loading":true,"a11y_improvements":true,"e_import_export":true,"e_hidden_wordpress_widgets":true,"landing-pages":true,"elements-color-picker":true,"favorite-widgets":true,"admin-top-bar":true,"form-submissions":true},"urls":{"assets":"https:\/\/www.invencivelprepara.com\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":5517,"title":"ESTRUTURA%20PROPRIA%20GERAL%20NO%20DIRETO%20-%20Invenc%C3%ADvel%20Prepara","excerpt":"","featuredImage":false}};
		</script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.5.5' id='elementor-frontend-js'></script>
		<script src='https://www.invencivelprepara.com/wp-content/plugins/elementor-pro/assets/js/elements-handlers.min.js?ver=3.2.1' id='pro-elements-handlers-js'></script>
		<script>
			/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
	</body>
	</html>
