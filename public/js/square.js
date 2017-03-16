/**

falling rainbow squares
By Ana Tudor

**/

(function() {
    var canvas = document.getElementById('square-canvas'),
            context = canvas.getContext('2d');

    // resize the canvas to fill browser window dynamically
    window.addEventListener('resize', resizeCanvas, false);

    function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight + 100;
            
            drawStuff(); 
    }
    resizeCanvas();

    function drawStuff() {
      var N_SQUARES = 164, 
      OPTS = ['fill', 'stroke'], 
      c = document.querySelector('canvas'), 
      ξ = c.getContext('2d'), 
      w = c.width, h = c.height, co = 1*h, 
      squares = [];

      var rand = function(max, min, is_int) {
      var max = ((max - 1) || 0) + 1, 
      min = min || 0, 
      gen = min + (max - min)*Math.random();

      return is_int ? ~~gen : gen;
      };

      var Square = function() {
      var x, y, e, o, θ, v, ω, α, φ, a, f;

      this.init = function() {
      e = rand(16, 8, 1); // square edge length
      o = -.5*e;
      x = rand(w - o, o, 1);
      y = rand(-co, -e, 1);
      θ = rand(.5*Math.PI);
      v = rand(5, .25); // speed going down
      ω = rand(.02, .005)*Math.PI; // angular velocity
      α = [.5, .5]; φ = []; a = []; f = [];

      for(var i = 0; i < 2; i++) {
      φ.push(rand(2*Math.PI));
      a.push(rand(.4, .1));
      f.push(rand(.001, .0001)*Math.PI);
      }
      };

      this.update = function(t) {
      var k, d;

      y += v;
      θ += ω;

      k = Math.max(0, Math.floor(y/co));
      d = y - co;

      for(var i = 0; i < 2; i++) 
      α[i] = Math.max(0, .4 + .1*i + a[i]*Math.sin(f[i]*t + φ[i]) - k*d*.01);

      if(y > h + e || !(α[0] + α[1])) this.init();

      ξ.fillStyle = ξ.strokeStyle = 'hsl(' + ~~(t + .2*y) + ',100%,65%)';

      this.draw();
      };

      this.draw = function() {
      ξ.save();
      ξ.translate(x, y);
      ξ.rotate(θ);

      for(var i = 0; i < 2; i++) {
      ξ.beginPath();
      ξ.globalAlpha = α[i];
      ξ[OPTS[i] + 'Rect'](o, o, e, e);
      }

      ξ.restore();
      };

      this.init();
      };

      var ani = function(t) {
      ξ.clearRect(0, 0, w, h);

      for(var i = 0; i < N_SQUARES; i++) 
      squares[i].update(t);

      requestAnimationFrame(ani.bind(this, ++t));
      };

      (function init() {
      for(var i = 0; i < N_SQUARES; i++) 
      squares.push(new Square);

      ani(0);
      })();
    }
})();