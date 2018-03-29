# Pebo_wp_nonce_helper
<h3>Hellper clas for handling nonces on WorPress.</h3>
<h4><strong></strong></h4>
<h4><strong>Ussage:</strong></h4>
<p>to include this class in to your project:</p>
<ul>
<li>download or clone this project and place the file&nbsp;<a class="js-navigation-open" title="Pebo_wp_nonce_helper.php" id="a56be3fed4cae429b7ce011d32a6cf28-70177936f4379dd925f63023abcb01a700575013" href="https://github.com/petersk8/Pebo_wp_nonce_helper/blob/master/Pebo_wp_nonce_helper.php">Pebo_wp_nonce_helper.php</a> in to your library folder (inside your project).</li>
<li>include the class in your code file:</li>
</ul>
<pre class="lang-php prettyprint prettyprinted"><code><span class="pln">require_once dirname</span><span class="pun">(</span><span class="pln">__FILE__</span><span class="pun">).</span><span class="str">'/you_library_path/<span style="color: #000000;">Pebo_wp_nonce_helper.php</span>'</span><span class="pun">;</span></code></pre>
<ul>
<li>Call methods using the formula:</li>
</ul>
<pre class="lang-php prettyprint prettyprinted"><code><span class="str"><span style="color: #000000;">Pebo_wp_nonce_helper.php::method_name($args ...)</span></span></code>;</pre>
<p></p>
<h4>Funtionality:</h4>
<p>Setting nonces life time:</p>
<pre class="lang-php prettyprint prettyprinted"><code><span class="str"><span style="color: #000000;">Pebo_wp_nonce_helper.php::set_nonce_duration($time_in_secconds)</span></span></code>;</pre>
<p></p>
<div>
<div><span>Creating a nonce url (for a link): </span></div>
<pre class="php">&lt;a href="&lt;?php print <code><span class="str"><span style="color: #000000;">Pebo_wp_nonce_helper::create_nonce_url</span></span></code>(admin_url('options.php?page=my_plugin_settings'), 'doing_something', 'my_nonce');?&gt;" class="button button-primary"&gt;&lt;?php esc_html_e('Do Something!', 'my-plugin-textdomain');?&gt;&lt;/a&gt;</pre>
<div><span></span></div>
<div><span></span>Nonce validation:</div>
<pre><code>
  if(Pebo_wp_nonce_helper::nonce_verify('nonce_name', 'action_name') != false){
  	//Do Something..
  {
  </code></pre>
<div>
<div></div>
<div>Create nonce hidden field inside a form :</div>
<pre>&lt;form method="post"&gt;
   &lt;!-- some inputs here ... --&gt;
   &lt;?php <code>Pebo_wp_nonce_helper::get_hidden_field</code>( 'name_of_my_action', 'name_of_nonce_field' );&nbsp;<br />?&gt; <br />&lt;/form&gt;</pre>
<div></div>
<div>Validate a nonce hidden field.</div>
<div>
<div></div>
<pre><code>
  if(Pebo_wp_nonce_helper::check_nonce_field('nonce_name', 'action_name') != false){
  	//Do Something..
  {
  </code></pre>
<div>
<div></div>
</div>
</div>
</div>
</div>
<p><strong></strong></p>
