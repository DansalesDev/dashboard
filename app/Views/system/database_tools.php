<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url()?>" class="h1"><i class="fas fa-code"></i> <b>Developper</b> Dashboard</a>
        </div>
        <div class="card-body">
            <form id="update-schema-form" method="post">
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Atualizar a estrutura do banco de dados</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function onPageReady(){
        $('#update-schema-form').on('submit', function (e){
            $.post('<?= base_url('tools/update')?>', function (result) {
                if(!result.error) {
                    diplayMessage('success', result.message);
                } else {
                    if(result.error.code === 500){
                        diplayMessage('error', result.message);
                    } else {
                        diplayMessage('warning', result.message);
                    }
                }
            }, 'json')
            e.preventDefault();
        })
    }
</script>