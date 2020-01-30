<html>
<head>
<style>
body{
	background-color:#f2f2f2;
	height: 100%;
	width:100%;
}
.container {
	width: 150px;
	height: 150px;
	margin: 50px auto;
	position: relative;
	perspective: 500px;
}
#cube {
	width: 100%;
	height: 100%;
	position: absolute;
	transform-style: preserve-3d;
	transition: transform 1s;
}
#cube figure {
	position: absolute;
	width: 100%;
	height: 100%;
	margin: 0;
	border: 1px solid #bcbcbc;
}
#cube .back {
	background: rgba(255,255,255,0.5);
	transform: rotateX(0deg) translateZ(-75px);
}
#cube .left {
	background: rgba(255,255,255,0.5);
	transform: rotateY(90deg) translateZ(-75px);
}
#cube .bottom {
	background: rgba(255,255,255,0.5);
	transform: rotateX(90deg) translateZ(-75px);
}
#cube .front {
	background: rgba(255,255,255,0.5);
	transform: rotateX(0deg) translateZ(75px);
}
#cube .right {
	background: rgba(255,255,255,0.5);
	transform: rotateY(90deg) translateZ(75px);
}
#cube .top {
	background: rgba(255,255,255,0.5);
	transform: rotateX(90deg) translateZ(75px);
}
.botones {
  width: 30px;
  height: 30px;
  margin: 0 auto;
  position: relative;
 }
.boton {
  /*estructura*/
  width: 30px;
  height: 30px;
  background-color: rgba(255,255,255,0.5);
  border-radius: 50%;
  position: absolute;
  /*texto*/ 
  color: #999;
  font-weight: bold;
  text-align: center;
  line-height: 30px;
  cursor: pointer;
  user-select: none;
}
#abajo {
  top: 35px;
}
#izquierda {
  top: 35px;
  left: -35px;
}
#derecha {
  top: 35px;
  left: 35px;
}
</style>
</head>

<body>


<section class="container">
  <div id="cube">
    <figure class="back"></figure>
    <figure class="left"></figure>
    <figure class="bottom"></figure>
    <figure class="front"></figure>
    <figure class="right"></figure>
    <figure class="top"></figure>
  </div>
</section>
<section class="botones">
  <div class="boton" id="arriba">▲</div>
  <div class="boton" id="abajo">▼</div>
  <div class="boton" id="izquierda">◄</div>
  <div class="boton" id="derecha">►</div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
var angX = 0;
var angY = 0;

$('.boton').on('click', function() {
  switch ($(this).attr("id")) {
    case "arriba":
      angX = angX + 90;
      break;
    case "abajo":
      angX = angX - 90;
      break;
    case "derecha":
      angY = angY + 90;
      break;
    case "izquierda":
      angY = angY - 90;
      break;
  }
  $('#cube').attr('style', 'transform: rotateX(' + angX + 'deg) rotateY(' + angY + 'deg);')
});
</script>
</body>
</html>