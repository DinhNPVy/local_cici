<style>
    .nNote {
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        -khtml-border-radius: 2px;
        border-radius: 2px;
    }

    .nNote {
        cursor: pointer;
        margin: 32px 0px 0px 0px;
        box-shadow: inset 0 0 1px #fff;
        -webkit-box-shadow: inset 0 0 1px #fff;
        -moz-box-shadow: inset 0 0 1px #fff;
    }

    .nNote strong {
        margin-right: 5px;
    }

    .nNote p {
        font-size: 15px;
        padding: 10px 25px 10px 54px;
        margin: 0px;
        color: #565656;
    }

    .nInformation {
        background: #deeefa no-repeat 15px center;
        border: 1px solid #afd3f2;
        color: #235685;
        border-radius: 10px;
    }
</style>

<?php if (isset($message) && $message) : ?>
    <div class="nNote nInformation hideit">
        <p><img src="<?php echo public_url('admin/assets') ?>/img/megaphone-outline.svg" style="height: 18px; color:#deeefa;" alt="" /><strong> INFORMATION: </strong><?php echo $message ?></p>
    </div>
    <script src="<?php echo public_url('admin/assets') ?>/js/core/jquery-1.11.1.min.js">
    </script>
    <script>
        $(function() {
            $(".hideit").click(function() {
                $(this).fadeOut();
            });
        })
    </script>
<?php endif; ?>