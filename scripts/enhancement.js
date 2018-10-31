/**
* Author: Lakshmi Saketh
* Target:enhancement2.html 
*Purpose: to show enhancements
*Created: 04/25/2018
*Last updated:04/17/2018
*Credits:
*/

"use strict"; // prevents creation of global variables
function clock_function() {
  var now = new Date();
  var clock_var = document.getElementById('Clock').getContext('2d');
  clock_var.save();
  clock_var.clearRect(0, 0, 150, 150);
  clock_var.translate(75, 75);
  clock_var.scale(0.4, 0.4);
  clock_var.rotate(-Math.PI / 2);
  clock_var.strokeStyle = 'Red';
  clock_var.fillStyle = 'Green';
  clock_var.lineWidth = 8;
  clock_var.lineCap = 'round';

  // Hour marks
  clock_var.save();
  for (var i = 0; i < 12; i++) {
    clock_var.beginPath();
    clock_var.rotate(Math.PI / 6);
    clock_var.moveTo(100, 0);
    clock_var.lineTo(120, 0);
    clock_var.stroke();
  }
  clock_var.restore();

  // Minute marks
  clock_var.save();
  clock_var.lineWidth = 5;
  for (i = 0; i < 60; i++) {
    if (i % 5!= 0) {
      clock_var.beginPath();
      clock_var.moveTo(117, 0);
      clock_var.lineTo(120, 0);
      clock_var.stroke();
    }
    clock_var.rotate(Math.PI / 30);
  }
  clock_var.restore();
 
  var sec = now.getSeconds();
  var min = now.getMinutes();
  var hr  = now.getHours();
  hr = hr >= 12 ? hr - 12 : hr;

  clock_var.fillStyle = 'black';

  // write Hours
  clock_var.save();
  clock_var.rotate(hr * (Math.PI / 6) + (Math.PI / 360) * min + (Math.PI / 21600) *sec);
  clock_var.lineWidth = 14;
  clock_var.beginPath();
  clock_var.moveTo(-20, 0);
  clock_var.lineTo(80, 0);
  clock_var.stroke();
  clock_var.restore();

  // write Minutes
  clock_var.save();
  clock_var.rotate((Math.PI / 30) * min + (Math.PI / 1800) * sec);
  clock_var.lineWidth = 10;
  clock_var.beginPath();
  clock_var.moveTo(-28, 0);
  clock_var.lineTo(112, 0);
  clock_var.stroke();
  clock_var.restore();
 
  // Write seconds
  clock_var.save();
  clock_var.rotate(sec * Math.PI / 30);
  clock_var.strokeStyle = 'black';
  clock_var.fillStyle = '#D40000';
  clock_var.lineWidth = 6;
  clock_var.beginPath();
  clock_var.moveTo(-30, 0);
  clock_var.lineTo(83, 0);
  clock_var.stroke();
  clock_var.beginPath();
  clock_var.arc(0, 0, 10, 0, Math.PI * 2, true);
  clock_var.fill();
  clock_var.beginPath();
  clock_var.arc(95, 0, 10, 0, Math.PI * 2, true);
  clock_var.stroke();
  clock_var.fillStyle = 'white';
  clock_var.arc(0, 0, 3, 0, Math.PI * 2, true);
  clock_var.fill();
  clock_var.restore();

  clock_var.beginPath();
  clock_var.lineWidth = 14;
  clock_var.strokeStyle = 'black';
  clock_var.arc(0, 0, 142, 0, Math.PI * 2, true);
  clock_var.stroke();

  clock_var.restore();

  window.requestAnimationFrame(clock_function);
}


window.requestAnimationFrame(clock_function);

