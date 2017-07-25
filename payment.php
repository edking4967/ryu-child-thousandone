<?php
/*
 * Template Name: Payment 
 * Description: Payment page for thousandonestories.com
 */

get_header(); ?>
	<div id="primary" class="content-area">

		<div id="content" class="site-content" role="main">
            <div class="entry-content">
                <table class="tip-box" border="0">
                    <tr>
                        <td>
                            <p class= "tip-box">You will be taken to PayPal to make a payment.</p>
                            <form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="business" value="thousandonestories@gmail.com" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="text" name="item_name" value="Payment for" placeholder="Payment for">
                                <input type="text" name="amount" value="" placeholder="Enter amount ($)" />
                                <input type="image" src="http://thousandonestories.com/wp-content/uploads/2017/07/tip-button.png" border="0" name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!" />
                            </form>
                        </td>
                    </tr>
                </table>
            </div><!-- class="entry-content"-->
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
