 <div class="top-bar-section">
    <ul class="right">
        <?php if(!empty($user_session)){ ?>
        <li><a target="_blank" href="https://api.cakephp.org/3.0/"><?=  __($user_session['username']); ?></a></li>
        <?php } else { ?>
        <li><a target="_blank" href="https://api.cakephp.org/3.0/"><?=  __('No user login'); ?></a></li>
        <?php }  ?>
    </ul>
</div>