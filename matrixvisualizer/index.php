<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <script type="text/javascript">
      var canvas, ctx, a, b, c, d;
      var matrix = {a: 1, b: 0, c: 0, d: 1};

      window.onload = function() {
        canvas = document.getElementById('canvas');
        ctx = canvas.getContext('2d');

        a = document.getElementById('matrix_a');
        b = document.getElementById('matrix_b');
        c = document.getElementById('matrix_c');
        d = document.getElementById('matrix_d');

        resize();

        draw();
      }

      function draw() {
        ctx.setTransform(1, 0, 0, 1, 0, 0);
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        ctx.setTransform(matrix.a, matrix.b, matrix.c, matrix.d, canvas.width * 0.5, canvas.height * 0.5);
        ctx.fillStyle = 'rgba(64, 255, 64, 0.7)';
        ctx.beginPath();
        ctx.fillRect(-100, -100, 200, 200);

        ctx.setTransform(1, 0, 0, 1, 0, 0);
        drawGrid();
      }

      function resize() {
        canvas.width = document.documentElement.clientWidth;
        canvas.height = document.documentElement.clientHeight;
      }

      function drawGrid() {
        ctx.strokeStyle = 'rgba(255, 255, 255, 0.6)';
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(canvas.width * 0.5, 0);
        ctx.lineTo(canvas.width * 0.5, canvas.height);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(0, canvas.height * 0.5);
        ctx.lineTo(canvas.width, canvas.height * 0.5);
        ctx.stroke();

        ctx.strokeStyle = 'rgba(255, 255, 255, 0.2)';
        ctx.lineWidth = 1;
        for (var i = 1; i < canvas.width / 100; i++) {
          ctx.beginPath();
          ctx.moveTo(canvas.width * 0.5 + 50 * i, 0);
          ctx.lineTo(canvas.width * 0.5 + 50 * i, canvas.height);
          ctx.stroke();
          ctx.beginPath();
          ctx.moveTo(canvas.width * 0.5 - 50 * i, 0);
          ctx.lineTo(canvas.width * 0.5 - 50 * i, canvas.height);
          ctx.stroke();
        }

        for (var i = 1; i < canvas.height / 100; i++) {
          ctx.beginPath();
          ctx.moveTo(0 ,canvas.height * 0.5 + 50 * i);
          ctx.lineTo(canvas.width, canvas.height * 0.5 + 50 * i);
          ctx.closePath();
          ctx.stroke();
          ctx.beginPath();
          ctx.moveTo(0, canvas.height * 0.5 - 50 * i);
          ctx.lineTo(canvas.width, canvas.height * 0.5 - 50 * i);
          ctx.closePath();
          ctx.stroke();
        }
      }

      window.onresize = function() {
        resize();
        draw();
      }

      function calc() {
        if (isNumeric(a.value) && isNumeric(b.value) && isNumeric(c.value) && isNumeric(d.value)) {
          matrix.a = parseFloat(a.value);
          matrix.b = parseFloat(b.value);
          matrix.c = parseFloat(c.value);
          matrix.d = parseFloat(d.value);
          draw()
        }
      }

      function isNumeric(x){
        if (typeof x !== 'number' && typeof x !== 'string') {
          return false;
        } else {
          return (x == parseFloat(x) && isFinite(x));
        }
      }

      window.onkeypress = function() {
        calc();
      }
    </script>
    <style type="text/css">
      * {
        margin: 0;
        padding: 0;
      }

      canvas {
        background-color: black;
      }

      #panel {
        position: absolute;
        right: 5%;
        bottom: 5%;
        width: 226px;
        height: 104px;
        z-index: 1;
        background-color: rgba(224, 224, 224, 0.6);
        padding: 5px;
      }

      .parenthesis {
        font-size: 88px;
        width: 30px;
      }

      form, .parenthesis {
        float: left;
      }

      input {
        background-color: rgba(224, 224, 224, 0.6);
        width: 70px;
        height: 40px;
        margin: 4px;
        float: left;
        font-size: 20px;
        text-align: center;
      }

      input:nth-of-type(3) {
        clear: left;
      }

      #ad {
        position: absolute;
        left: 5%;
        bottom: 5%;
      }
    </style>
    <title>Matrix Visualizer</title>
  </head>
  <body>
    <canvas id="canvas"></canvas>
    <div id="panel">
      <p class="parenthesis">(</p>
      <form>
        <input id="matrix_a" type="text" value="1">
        <input id="matrix_b" type="text" value="0">
        <input id="matrix_c" type="text" value="0">
        <input id="matrix_d" type="text" value="1">
      </form>
      <p class="parenthesis">)</p>
    </div>
    <div id="ad">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- Matrix Visualizer -->
      <ins class="adsbygoogle"
           style="display:inline-block;width:728px;height:90px"
           data-ad-client="ca-pub-6807892574075028"
           data-ad-slot="3170405797"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </body>
</html>
