







































































































































<footer class="section-footer border-top bg-white">
    <section class="footer-main border-top pt-5 pb-4">
        <div class="container">
            <div class="row" id="contato">

                
                <aside class="col-md-4 mb-4">
                    <h6 class="title mb-3">Precisa de ajuda?</h6>
                    <ul class="list-unstyled list-padding">
                        <?php if($configuracoes->telefone1 || $configuracoes->telefone2): ?>
                            <li class="footer-li mb-2">
                                <i class="fa fa-question-circle"></i>
                                <span>Atendimento de segunda a sábado.</span>
                            </li>
                        <?php endif; ?>

                        <li class="footer-li mb-2">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            <a href="<?php echo e(route('lgpd_termos')); ?>" class="text-dark">
                                Política de Privacidade
                            </a>
                        </li>
                        
                    </ul>

                    <?php if(!empty($configuracoes->logo)): ?>
                        <div class="mt-3 footer-logo-muted">
                            <img src="<?php echo e(asset($configuracoes->logo)); ?>"
                                 alt="<?php echo e(config('app.name')); ?>"
                                 style="max-height:80px;">
                        </div>
                    <?php endif; ?>

                </aside>

                
                <aside class="col-md-4 mb-4">
                    <h6 class="title mb-3">Quer falar com a gente?</h6>
                    <ul class="list-unstyled list-padding">
                        <?php
                            $linha1 = implode(', ', array_filter([
                                $configuracoes->rua,
                                $configuracoes->bairro,
                            ]));

                            $linha2 = implode(' / ', array_filter([
                                $configuracoes->cidade,
                                $configuracoes->estado,
                            ]));
                        ?>

                        <?php if($linha1 || $linha2): ?>
                            <li class="footer-li mb-2">
                                <i class="fa fa-map-marker"></i>
                                <span>
                                    <?php if($linha1): ?> <?php echo e($linha1); ?> <?php endif; ?>
                                    <?php if($linha1 && $linha2): ?><br><?php endif; ?>
                                    <?php if($linha2): ?> <?php echo e($linha2); ?> <?php endif; ?>
                                 </span>
                            </li>
                        <?php endif; ?>

                        <?php if($configuracoes->telefone1): ?>
                            <li class="footer-li mb-2">
                                <i class="fa fa-whatsapp"></i>
                                <a href="https://wa.me/<?php echo e(preg_replace('/\D/','',$configuracoes->telefone1)); ?>"
                                   target="_blank"
                                   class="text-dark">
                                    <?php echo e($configuracoes->telefone1); ?>

                                    <small class="text-muted">(WhatsApp)</small>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if($configuracoes->telefone2): ?>
                            <li class="footer-li mb-2">
                                <i class="fa fa-phone"></i>
                                <a href="tel://<?php echo e($configuracoes->telefone2); ?>" class="text-dark">
                                    <?php echo e($configuracoes->telefone2); ?>

                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if($configuracoes->email1): ?>
                            <li class="footer-li mb-2">
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:<?php echo e($configuracoes->email1); ?>" class="text-dark">
                                    <?php echo e($configuracoes->email1); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>

                    
                    <?php if($configuracoes->telefone1): ?>
                        <a href="https://wa.me/<?php echo e(preg_replace('/\D/','',$configuracoes->telefone1)); ?>"
                           target="_blank"
                           class="btn btn-sm text-white mt-2"
                           style="background:#25d366; border-radius:20px; padding:6px 18px;">
                            <i class="fa fa-whatsapp"></i> Fale conosco pelo WhatsApp
                        </a>
                    <?php endif; ?>
                </aside>

                
                <?php if($configuracoes->maps_iframe): ?>
                <aside class="col-md-4 mb-4">
                    <h6 class="title mb-3">Como chegar</h6>
                    <div class="g-maps">
                        <?php echo $configuracoes->maps_iframe; ?>

                    </div>
                </aside>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="footer-bottom py-3" id="horarioFuncionamento" style="background:#697b2b; color:#fff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-2 mb-md-0">
                    <?php if($configuracoes->horario_funcionamento): ?>
                        <i class="fa fa-clock-o"></i>
                        <?php echo e($configuracoes->horario_funcionamento); ?> |
                    <?php endif; ?>
                    <span class="pr-2">© <?php echo e(config('app.name')); ?></span>
                </div>

                <div class="col-md-4 mb-2 mb-md-0">
                    <span class="mr-2" style="font-size: 0.95rem; white-space: nowrap;">
                       Desenvolvido com
                       <span style="color:#fff; font-size: 1.1rem;">♥</span>
                        por
                        <a href="https://wetech.com.br" target="_blank"
                           style="color:#ffffff; font-weight:600; text-decoration:none;">
                            Wetech
                        </a>
                    </span>
                </div>

                <div class="col-md-2 text-md-right">
                    <?php if($configuracoes->facebook): ?>
                        <a href="<?php echo e($configuracoes->facebook); ?>" target="_blank"
                           class="btn btn-icon btn-sm rounded-circle social-facebook">
                            <i class="icofont-facebook"></i>
                        </a>
                    <?php endif; ?>

                    <?php if($configuracoes->instagram): ?>
                        <a href="<?php echo e($configuracoes->instagram); ?>" target="_blank"
                           class="btn btn-icon btn-sm rounded-circle social-instagram">
                            <i class="icofont-instagram"></i>
                        </a>
                    <?php endif; ?>

                    <?php if($configuracoes->twitter): ?>
                        <a href="<?php echo e($configuracoes->twitter); ?>" target="_blank"
                           class="btn btn-icon btn-sm rounded-circle social-twitter">
                            <i class="icofont-twitter"></i>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.lgpd-aceite', [])->html();
} elseif ($_instance->childHasBeenRendered('dBpNTtr')) {
    $componentId = $_instance->getRenderedChildComponentId('dBpNTtr');
    $componentTag = $_instance->getRenderedChildComponentTagName('dBpNTtr');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('dBpNTtr');
} else {
    $response = \Livewire\Livewire::mount('site.lgpd-aceite', []);
    $html = $response->html();
    $_instance->logRenderedChild('dBpNTtr', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</footer>

<style>
    .footer-li {
        display: flex;
        align-items: flex-start;
    }

    .footer-li i {
        padding-top: 3px;
        padding-right: 6px;
    }

    .g-maps {
        height: 100%;
    }

    .g-maps iframe {
        width: 100%;
        height: inherit;
    }

    .place-card-medium {
        display: none !important;
    }

    .social-facebook {
        background: #1877F2;   /* azul Facebook */
        color: #fff;
    }

    .social-instagram {
        background: #E4405F;   /* rosa Instagram */
        color: #fff;
    }

    .social-twitter {
        background: #1DA1F2;   /* azul Twitter/X (ajuste se usar outro) */
        color: #fff;
    }

    .social-facebook i,
    .social-instagram i,
    .social-twitter i {
        color: #fff;
    }

</style>

<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/layouts/site/includes/footer.blade.php ENDPATH**/ ?>