<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var_dump($pessoas);
?>
<div id="app-2">
  <span v-bind:title="message" v-on:mousehouver="reverseMessage">
    Hover your mouse over me for a few seconds
    to see my dynamically bound title!
  </span>
</div>

<script>
 var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!'
  }
});
var app2 = new Vue({
  el: '#app-2',
  data: {
    message: 'You loaded this page on ' + new Date().toLocaleString()
  },
  methods: {
    reverseMessage: function () {
      this.message =  'You loaded this page on ' + new Date().toLocaleString()
    }
}
})
    </script>