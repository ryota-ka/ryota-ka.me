<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
  <head>
    <meta charset="utf-8">
    <meta property="og:title" content="Matrix Visualizer">
    <meta property="og:type" content="article">
    <meta property="og:url" content="http://ryota-ka.me/matrixvisualizer/">
    <meta property="og:image" content="http://ryota-ka.me/img/icons/works/matrixvisualizer.png">
    <meta property="og:description" content="2x2行列による平面上の線形変換を可視化します。">
    <meta property="og:site_name" content="Ryota-ka.me">
    <script type="text/javascript">
      var canvas, ctx, a, b, c, d;
      var matrix = {a: 1, b: 0, c: 0, d: 1, det: 1, tr: 2};
      var eigenValue = [1, 1];
      var eigenVector = [[0, 0], [0, 0]];
      var shapeType = 0;

      window.onload = function() {
        canvas = document.getElementById('canvas');
        ctx = canvas.getContext('2d');

        a = document.getElementById('matrix_a');
        b = document.getElementById('matrix_b');
        c = document.getElementById('matrix_c');
        d = document.getElementById('matrix_d');

        resize();
        calc();

        canvas.addEventListener('click', function() {
          shapeType++;
          if (shapeType === 2) {
            shapeType = 0;
          }
          draw();
        });
      }

      function draw() {
        ctx.setTransform(1, 0, 0, 1, 0, 0);
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        ctx.setTransform(matrix.a, -matrix.c, matrix.b, -matrix.d, canvas.width * 0.5, canvas.height * 0.5);

        if (matrix.det > 0) {
          ctx.fillStyle = 'rgba(64, 255, 64, 0.7)';
        } else {
          ctx.fillStyle = 'rgba(255, 64, 64, 0.7)';
        }

        switch (shapeType) {
          case 0:
            ctx.beginPath();
            ctx.fillRect(-100, -100, 200, 200);
            break;
          case 1:
            ctx.beginPath();
            ctx.arc(0, 0, 100, 0, 2 * Math.PI);
            ctx.fill();
            break;
        }

        ctx.setTransform(1, 0, 0, 1, 0, 0);
        drawGrid();

        ctx.setTransform(1, 0, 0, 1, canvas.width * 0.5, canvas.height * 0.5);
        ctx.strokeStyle = 'rgba(64, 64, 255, 0.9)';
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(-50 * eigenValue[0] * eigenVector[0][0], 50 * eigenValue[0] * eigenVector[0][1]);
        ctx.lineTo(50 * eigenValue[0] * eigenVector[0][0], -50 * eigenValue[0] * eigenVector[0][1]);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(-50 * eigenValue[1] * eigenVector[1][0], 50 * eigenValue[1] * eigenVector[1][1]);
        ctx.lineTo(50 * eigenValue[1] * eigenVector[1][0], -50 * eigenValue[1] * eigenVector[1][1]);
        ctx.stroke();
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
          ctx.moveTo(0, canvas.height * 0.5 + 50 * i);
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
          matrix.det = matrix.a * matrix.d - matrix.b * matrix.c;
          matrix.tr = matrix.a + matrix.d;
          document.getElementById('det').textContent = 'determinant: ' + Math.round(matrix.det * 1000) / 1000;
          document.getElementById('tr').textContent = 'trace: ' + Math.round(matrix.tr * 1000) / 1000;

          var discriminant = matrix.tr * matrix.tr - 4 * matrix.det;

          if (discriminant >= 0) {
            var rootd = Math.sqrt(discriminant);
            if (matrix.b === 0 && matrix.c === 0) {
              eigenValue[0] = matrix.d;
              eigenValue[1] = matrix.a;
              eigenVector[0][0] = 0;
              eigenVector[0][1] = 1;
              eigenVector[1][0] = 1;
              eigenVector[1][1] = 0;
            } else {
              eigenValue[0] = (matrix.tr + rootd) * 0.5;
              eigenValue[1] = (matrix.tr - rootd) * 0.5;
              eigenVector[0][0] = matrix.b / Math.sqrt(matrix.b * matrix.b + (matrix.d - eigenValue[1]) * (matrix.d - eigenValue[1]));
              eigenVector[0][1] = (matrix.d - eigenValue[1]) / Math.sqrt(matrix.b * matrix.b + (matrix.d - eigenValue[1]) * (matrix.d - eigenValue[1]));
              eigenVector[1][0] = (matrix.a - eigenValue[0]) / Math.sqrt(matrix.c * matrix.c + (matrix.a - eigenValue[0]) * (matrix.a - eigenValue[0]));
              eigenVector[1][1] = matrix.c / Math.sqrt(matrix.c * matrix.c + (matrix.a - eigenValue[0]) * (matrix.a - eigenValue[0]));
            }

            /*
            if (Math.round((matrix.a - eigenValue[0]) / matrix.c * 10000) != Math.round(eigenVector[0][0] / eigenVector[0][1] * 10000)) {
              console.log('swapped [' + matrix.a + ', ' + matrix.b + ', ' + matrix.c + ', ' + matrix.d + ']');
              var temp0 = eigenVector[0][0];
              var temp1 = eigenVector[0][1];
              eigenVector[0][0] = eigenVector[1][0];
              eigenVector[0][1] = eigenVector[1][1];
              eigenVector[1][0] = temp0;
              eigenVector[1][1] = temp1;
            }
            */

            document.getElementById('eigenvalues').textContent = 'eigenvalue' + (eigenValue[0] == eigenValue[1] ? ': ' + Math.round(eigenValue[0] * 1000) / 1000 : 's: ' + Math.round(eigenValue[0] * 1000) / 1000 + ', ' + Math.round(eigenValue[1] * 1000) / 1000);
            if (matrix.det === 0) {
              if (!isNumeric(eigenVector[0][0]) && isNumeric(eigenVector[1][0])) {
                eigenVector[0][0] = eigenVector[1][0];
                eigenVector[0][1] = eigenVector[1][1];
              }
              if (isNumeric(eigenVector[0][0])) {
                document.getElementById('eigenvectors').textContent = 'eigenvector: (' + Math.round(eigenVector[0][0] * 1000) / 1000 + ', ' + Math.round(eigenVector[0][1] * 1000) / 1000 + ')';
              } else {
                document.getElementById('eigenvectors').textContent = '';
              }
            } else if (eigenValue[0] == eigenValue[1]) {
              if (matrix.a !== 0 && matrix.a === matrix.d && matrix.b === 0 && matrix.c === 0) {
                document.getElementById('eigenvectors').textContent = 'eigenvectors: any vectors';
              } else {
                if (!isNumeric(eigenVector[0][0]) && isNumeric(eigenVector[1][0])) {
                  eigenVector[0][0] = eigenVector[1][0];
                  eigenVector[0][1] = eigenVector[1][1];
                }
                if (isNumeric(eigenVector[0][0])) {
                  document.getElementById('eigenvectors').textContent = 'eigenvector: (' + Math.round(eigenVector[0][0] * 1000) / 1000 + ', ' + Math.round(eigenVector[0][1] * 1000) / 1000 + ')';
                }
               }
            } else {
              if (isNumeric(eigenVector[0][0]) && isNumeric(eigenVector[1][0])) {
                document.getElementById('eigenvectors').textContent = 'eigenvectors: (' + Math.round(eigenVector[0][0] * 1000) / 1000 + ', ' + Math.round(eigenVector[0][1] * 1000) / 1000 + '), (' + Math.round(eigenVector[1][0] * 1000) / 1000 + ', ' + Math.round(eigenVector[1][1] * 1000) / 1000 + ')';
              } else {
                document.getElementById('eigenvectors').textContent = '';
              }
            }
          } else {
            var rootd = Math.sqrt(-discriminant);
            document.getElementById('eigenvalues').textContent = 'eigenvalues: ' + Math.round(matrix.tr * 500) / 1000 + ' ±' + Math.round(matrix.tr * 500) / 1000 + 'i';
            document.getElementById('eigenvectors').textContent = '';
            eigenValue = [0, 0];
            eigenVector = [[0, 0], [0, 0]];
          }

          draw();
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

      #info {
        position: absolute;
        right: 5%;
        top: 5%;
        width: 226px;
        height: 150px;
        z-index: 1;
        background-color: rgba(225, 225, 225, 0.9);
        padding: 5px;
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
        height: 88px;
        line-height: 88px;
        margin: 4px 0;
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
    <div id="info">
      <p id="det">determinant: 1</p>
      <p id="tr">trace: 2</p>
      <p id="eigenvalues">eigenvalue: 1</p>
      <p id="eigenvectors"></p>
    </div>
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
