<?php
function trust_form_show_input() {
	global $trust_form;
	$col_name = $trust_form->get_col_name();
	$validate = $trust_form->get_validate();
	$config = $trust_form->get_config();
	$attention = $trust_form->get_attention();
	
	$nonce = wp_nonce_field('trust_form','trust_form_input_nonce_field');

	$html = <<<EOT
<div id="trust-form" class="contact-form contact-form-input" >
<p id="message-container-input">{$trust_form->get_input_top()}</p>
<form action="#trust-form" method="post" >
<table>
<tbody>
EOT;

	foreach ( $col_name as $key => $name ) {
		$html .= '<tr><th scope="row"><div class="subject"><span class="content">'.$name.'</span>'.(isset($validate[$key]['required']) && $validate[$key]['required'] == 'true' ? '<span class="require">'.$config['require'].'</span>' : '' ).'</div><div class="submessage">'.$attention[$key].'</div></th><td><div>'.$trust_form->get_element( $key ).'</div>';

		$err_msg = $trust_form->get_err_msg($key);
		if ( isset($err_msg) && is_array($err_msg) ) {
			$html .= '<div class="error">';
			foreach ( $err_msg as $msg ) {
				$html .= $msg.'<br />';
			}
			$html .= '</div>';
		}
		$html .= '</td></tr>';
	}
	$html .= <<<EOT
</tbody>
</table>
{$nonce}
<p id="confirm-button" class="submit-container">{$trust_form->get_form('input_bottom')}</p>
</form>
</div>
EOT;

	return $html;
}



function trust_form_show_confirm() {
	global $trust_form;
	$col_name = $trust_form->get_col_name();

	$nonce = wp_nonce_field('trust_form','trust_form_confirm_nonce_field');

	$html = <<<EOT
<div id="trust-form" class="contact-form contact-form-confirm" >
<p id="message-container-confirm">{$trust_form->get_form('confirm_top')}</p>
<form action="#trust-form" method="post" >
<table>
<tbody>
EOT;
	foreach ( $col_name as $key => $name ) {
		$html .= '<tr><th><div class="subject">'.$name.'</div></th><td><div>'.$trust_form->get_input_data($key).'</div>';
		$html .= '</td></tr>';
	}
	$html .= <<<EOT
</tbody>
</table>
{$nonce}
<p id="confirm-button" class="submit-container">{$trust_form->get_form('confirm_bottom')}</p>
</form>
</div>
EOT;
	return $html;
}



function trust_form_show_finish() {
	global $trust_form;
	
	$html = <<<EOT
<div id="trust-form" class="contact-form contact-form-finish" >
<p id="message-container-confirm">{$trust_form->get_form('finish')}</p>
</div>
EOT;
	return $html;
}
?>