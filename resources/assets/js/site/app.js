import swal from 'sweetalert2/dist/sweetalert2'
import { phoneBehavior, phoneOptions, validateEmail } from "../helpers/functions";

var SiteArmazem = {

    budgets: [],

    listenContactClick: function() {
        $(document).on('click', '.contact-link', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $("footer").offset().top
            }, 1000);
        });
    },

    listenProductsClick: function() {
        $(document).on('click', '.products-link', function(e) {
            if ($(this).hasClass('out')) return true;
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $(".products").offset().top
            }, 500);
        });
    },

    applyFloatingLabels: function() {

        $('footer .form-control').each(function() {
            $(this).data('placeholder', $(this).attr('placeholder'));
        });

        $(document).on('click focusout', 'footer .form-control', function(e) {

            e.stopImmediatePropagation();

            var $this = $(this);
            var placeholder = $this.data('placeholder');
            var id = $this.prop('id');
            var target = '#' + id;

            if (e.type === 'focusout') {
                $(target).val($(target).val().trim(" "));
            }

            if ($(this).val() !== '') return false;

            if (e.type === 'click') {

                $this.closest('.form-group').append(`
          <div class="floating-label" id="floating-label-${id}">
          ${placeholder}
          </div>
        `);

                $this.attr('placeholder', '');
                $('#floating-label-' + id).css({ display: "block", top: "0px", left: "6px" });

            } else {
                $this.attr('placeholder', placeholder);
                $('#floating-label-' + id).remove();
            }
        });
    },

    cropAndCenterImages: function() {

        $('.product-image').removeAttr('style');

        $('.product-image').each(function() {

            var $this = $(this);
            var parentWidth = $this.width();

            $this.css({
                width: parentWidth,
                height: parentWidth
            });

            $this.find('img').remove();

            var dataWidth = $this.data('width');
            var dataHeight = $this.data('height');

            var img = $("<img />").attr('src', '/images/produtos/marked/thumb-' + $this.data('src')).on('load', function() {
                if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
                    console.log('Falha ao carregar a imagem');
                } else {
                    img.css((dataWidth > dataHeight) ? 'height' : 'width', parentWidth);
                    $this.append(img);

                    var left = (img.width() - (parentWidth + 0.00000001)) / 2;
                    var top = (img.height() - (parentWidth + 0.00000001)) / 2;

                    if (left > 0) {
                        img.css('left', '-' + left + 'px');
                    }

                    if (top > 0) {
                        img.css('top', '-' + top + 'px');
                    }

                    img.show();
                }
            });
        });
    },

    listenMouseOverProducts: function() {

        $(document).on('mouseleave mouseout', '.product-controls', function(e) {
            e.stopImmediatePropagation();
            $(this).remove();
        });

        $(document).on('mouseenter', '.product-image', function(e) {

            e.stopImmediatePropagation();

            var $this = $(this);

            if ($this.find('.product-controls').length) {
                return false;
            }

            $('.product-controls').remove();

            if (e.type === 'mouseenter') {
                var category = $this.data('category');
                $(this).append(`
          <div class="product-controls">
            <a href="/produto/${$this.data('code')}" class="verProduto" title="Ver Produto ${$this.data('code')}"><span>${$this.data('code')}</span></a>
            <button 
              data-code="${$this.data('code')}"
              data-image="${$this.data('src')}"
              data-category="${$this.data('category')}"
              type="button" 
              class="btn add-to-budget">
              <i class="fas fa-dollar-sign"></i> Orçamento
            </button>
            <button data-src="${$this.data('src')}"
              data-code="${$this.data('code')}"
              data-image="${$this.data('src')}"
              data-category="${$this.data('category')}"
              data-toggle="lightbox"
              data-gallery="products-${$this.data('category')}-gallery"
              class="btn zoom-product">
              <i class="fas fa-search-plus"></i> Ampliar
            </button>
          </div>
        `);
            }
        });
    },

    selectCategoryLink: function() {

        $(document).on('click', '.categories a', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var $this = $(this);
            var category = $this.data('category');

            $('.categories a').removeClass('selected');
            $this.addClass('selected');

            $('.product-image').parent().hide();

            var offset = 0;
            var limit = 6;

            $('#categoryText').html(JSON.parse(categoriesTexts)[category]);

            $('.product-image[data-category="' + category + '"]').each(function(key, data) {
                if (key < limit) {
                    var $_this = $(this);
                    $_this.parent().show();
                    $_this.height($_this.width());
                }
            });

            SiteArmazem.cropAndCenterImages();
        });

    },

    listenLightboxClick: function() {

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {

            var $this = $(this);

            $('.modal-title').html(`Código: <span class="code">${$this.data('code')}</span>`)
            $('.modal-body').html(`<img src="/images/produtos/marked/${$this.data('src')}" style="max-width: 640px; width:100%"/>`);
            $('.modal-footer').html(`
        <button
          data-code="${$this.data('code')}"
          data-image="${$this.data('src')}"
          data-category="${$this.data('category')}" 
          type="button" 
          class="btn btn-primary add-to-budget">
          <i class="fas fa-dollar-sign"></i> Orçamento
        </button>
        <a class="btn btn-link" style="background-color: black" href="/produto/${$this.data('code')}"><i class="fas fa-external-link-alt"></i> Ver</a>
      `);

            $('.modal-dialog').css('width', '640px');
            $('#modal').modal('show');

            var imageList = $('[data-gallery="' + $this.data('gallery') + '"]');

            event.preventDefault();
        });
    },

    listenAddToBudgetClick: function() {

        $(document).on('click', '.add-to-budget', function(event) {
            var $this = $(this);

            $('#modal').modal('hide');

            swal({
                title: 'Adicionado',
                html: `
          O produto foi adicionado com sucesso!
          <br>Gerencie seus orçamentos
          <br>no menu superior.
        `,
                type: 'success',
                confirmButtonText: 'Fechar'
            }).then(result => {
                if (result.value) {


                    SiteArmazem.budgets.push({
                        'category': $this.data('category'),
                        'code': $this.data('code'),
                        'image': $this.data('image'),
                    });

                    window.localStorage.setItem('budget', JSON.stringify(SiteArmazem.budgets));
                    SiteArmazem.cartTotal();
                }
            })
        });
    },

    buildBudgetsList: function() {

        var storage = JSON.parse(window.localStorage.getItem('budget'));
        var budgets = [];

        $(storage).each(function(key, data) {

            if (undefined === budgets[data.category]) {
                budgets[data.category] = [];
            }

            if (budgets[data.category].indexOf(data.code) === -1) {
                budgets[data.category].push(data.code);
            }
        });

        return budgets;
    },

    showBudgetManagerItems: function() {

        const budgets = SiteArmazem.buildBudgetsList();

        if (budgets.length == undefined) return;

        var budgetsList = [];

        for (var category in budgets) {
            budgetsList.push([
                '<div class="budget-category">' + category + '</div>'
            ].join(''));
        }
    },

    cartTotal: function() {

        var budget = JSON.parse(window.localStorage.getItem('budget'));

        var budgetList = [];
        var budgetListLength = 0;

        $(budget).each(function(key, data) {
            if (undefined === budgetList[data.category]) {
                budgetList[data.category] = [];
            }
            if (budgetList[data.category].indexOf(data.code) === -1) {
                budgetList[data.category].push([data.code, data.image]);
                budgetListLength++;
            }
        });

        let $cartBudget = $('.cart .badge');
        $cartBudget.html(budgetListLength);

        if (budgetListLength > 0) {
            $cartBudget.addClass('items');
        } else {
            $cartBudget.removeClass('items');
            $('#budgetTable').html('<tr><td>Você não possui orçamentos!</td></tr>');
            $('#budget-products').addClass('d-none');
        }
    },

    showBudgetCart: function() {

        var budget = JSON.parse(window.localStorage.getItem('budget'));

        var budgetList = [];
        var budgetListLength = 0;

        $(budget).each(function(key, data) {

            if (undefined === budgetList[data.category]) {
                budgetList[data.category] = [];
            }

            if (budgetList[data.category].indexOf(data.code) === -1) {
                budgetList[data.category].push([data.code, data.image]);
                budgetListLength++;
            }
        });

        SiteArmazem.cartTotal();

        if (budgetListLength === 0) {
            $('#budgetTable').html('<tr><td>Você não possui orçamentos!</td></tr>');

        } else {

            var html = [];
            var selected = [];

            for (let category in budgetList) {

                var data = budgetList[category];

                $(data).each(function(key, product) {

                    if (selected.indexOf(product[0]) === -1) {

                        selected.push(product[0]);

                        const categoryText = $('.categories [data-category="' + category + '"]').text();

                        html.push(`
                    <tr>
                        <td class="modal-image-container p-0">
                            <a href="/produto/${product[0]}">
                                <img src="/images/produtos/marked/${product[1]}" alt="" style="width: 100%">
                                <img src="http://armazemdoescritorio.com.br/manutencao/${product[1]}.jpg" alt="" style="width: 100%">
                            </a>

                        </td>
                        <td style="vertical-align: middle">
                            <div>
                                <div class="col-md-6 font-weight-bold mb-2" style="font-size: 14px;"><b>${categoryText}: ${product[0]}</b></div>
                                <div class="d-flex justify-content-end">
                                    <input type="number" min="1" id="product-${product[0]}-quantity" value="1" class="form-control modal-input" />
                                    <a href="#" class="remove-product" data-code="${product[0]}" style="font-size: 15px;"><span class="fas fa-trash"></span></a>
                                </div>
                                <br />
                                <div>
                                    <textarea class="form-control" id="product-${product[0]}-message" placeholder="Adicionar observação"></textarea>
                                </div>
                        </td>
                    </tr>
            `);
                    }
                });
            }

            $('#budgetTable').html(html.join(''));
            $('#budget-products').removeClass('d-none');

            SiteArmazem.listenSendBudgetButtonClick();
        }
    },

    listenRemoveFromBudgetClick: function() {

        $(document).on('click', '.remove-product', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            $(this).closest('tr').remove();

            let code = $(this).data('code');

            const budget = [];
            $(SiteArmazem.budgets).each(function(key, data) {
                if (data.code != code) {
                    budget.push(data)
                }
            });

            SiteArmazem.budgets = budget;
            window.localStorage.setItem('budget', JSON.stringify(SiteArmazem.budgets));

            SiteArmazem.cartTotal();

            if ($('.modal-body table tr').length == 0) {
                $('#budgets-box').remove();
                $('#modal').modal('hide');
            }
        });
    },

    listenSendBudgetButtonClick: function() {

        if ($('#budgetPhone').length) {
            $('#budgetPhone').mask(phoneBehavior, phoneOptions);
        }

        $(document).on('click', '#sendBudget', function(event) {

            event.stopImmediatePropagation();

            const $name = $('#budgetName');
            const $email = $('#budgetEmail');
            const $phone = $('#budgetPhone');

            let name = $name.val();
            let email = $email.val();
            let phone = $phone.val();

            if (name.length < 3) {
                $name.focus();
                return false;
            }

            if (!validateEmail(email)) {
                $email.focus();
                return false;
            }

            if (phone.length < 13) {
                $phone.focus();
                return false;
            }

            let products = [];
            $(SiteArmazem.budgets).each(function(key, data) {
                products.push([
                    data.code,
                    $('#product-' + data.code + '-message').val(),
                    $('#product-' + data.code + '-quantity').val()
                ]);
            });

            $.ajax({
                type: 'POST',
                url: '/send-budget',
                data: {
                    name: $name.val(),
                    email: $email.val(),
                    phone: $phone.val(),
                    products: products
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function() {

                $('#modal').modal('hide');
                $('#budgets-box').remove();
                window.localStorage.setItem('budget', '[]');
                SiteArmazem.budgets = [];

                swal({
                    title: "Orçamento Enviado!",
                    html: `
            Seu orçamento foi enviado com sucesso.
            <br>Logo entraremos em contato.
            <br>Obrigado.
          `,
                    type: 'success',
                    confirmButtonText: 'Fechar'
                }).then(value => {
                    if (value) {
                        window.location.reload();
                    }
                });
            }).fail(function() {
                swal({
                    title: "Orçamento Não Enviado!",
                    html: `Não foi possível salvar o orçamento.`,
                    type: 'error',
                    confirmButtonText: 'Fechar'
                });
            })
        });
    },

    listenSendFormButtonClick: function() {

        if ($('#telefone').length) {
            $('#telefone').mask(phoneBehavior, phoneOptions);
        }

        $(document).on('click', '#sendContact', function(event) {

            event.stopImmediatePropagation();

            const $subject = $('#assunto');
            const $name = $('#nome');
            const $email = $('#email');
            const $phone = $('#telefone');
            const $message = $('#mensagem');
            const $relacionamento = $('#relacionamento');

            let subject = $subject.val();
            let name = $name.val();
            let email = $email.val();
            let phone = $phone.val();
            let message = $message.val();
            let relacionamento = $relacionamento.length ? 1 : 0;

            //
            // if (subject.length < 5) {
            //   $subject.focus();
            //   return false;
            // }

            if (name.length < 3) {
                $name.focus();
                return false;
            }

            if (!validateEmail(email)) {
                $email.focus();
                return false;
            }

            if (phone.length < 13) {
                $phone.focus();
                return false;
            }

            if (message.length < 3) {
                $message.focus();
                return false;
            }

            $.ajax({
                type: 'POST',
                url: '/send-form',
                data: {
                    subject: subject,
                    name: name,
                    email: email,
                    phone: phone,
                    message: message,
                    relacionamento: relacionamento
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function() {

                swal({
                    title: "Contato Enviado!",
                    html: `
            Seu contato foi enviado com sucesso.
            <br>Logo entraremos em contato.
            <br>Obrigado.
          `,
                    type: 'success',
                    confirmButtonText: 'Fechar'
                });

                $(':input').each(function() {
                    $(this).val('');
                    $(this).prop('placeholder', $(this).closest('.form-group').find('label').text())
                });

                $('#relacionamento').prop('checked', false);
                $('#nome').focus()

            }).fail(function() {
                swal({
                    title: "Contato Não Enviado!",
                    html: `Não foi possível salvar o contato.`,
                    type: 'error',
                    confirmButtonText: 'Fechar'
                });
            })
        });
    }
};

export default class SiteApp {

    /**
     * What happens when page loads.
     */
    constructor() {

        jQuery(function() {

            $(document).on('click', '#verCategorias, .verProdutos, .verProduto, .products-link', function() {
                window.localStorage.setItem('scrollToProducts', '1');
            });

            $(document).on('click', '#verEmpresa', function() {
                window.localStorage.setItem('scrollToEmpresa', '1');
            });

            if (window.localStorage.getItem('scrollToProducts') === '1') {
                $('html, body').animate({
                    scrollTop: $(".products").offset().top
                }, 500);
                window.localStorage.setItem('scrollToProducts', '0');
            }
            if (window.localStorage.getItem('scrollToEmpresa') === '1') {
                $('html, body').animate({
                    scrollTop: $("#targetEmpresa").offset().top
                }, 500);
                window.localStorage.setItem('scrollToEmpresa', '0');
            }

            $('[data-toggle="tooltip"]').tooltip();

            let localStorageBudgets = window.localStorage.getItem('budget') || "[]";
            SiteArmazem.budgets = JSON.parse(localStorageBudgets);

            SiteArmazem.showBudgetCart();
            SiteArmazem.listenContactClick();
            SiteArmazem.listenProductsClick();
            SiteArmazem.applyFloatingLabels();
            SiteArmazem.cropAndCenterImages();
            SiteArmazem.listenMouseOverProducts();
            SiteArmazem.selectCategoryLink();
            SiteArmazem.listenLightboxClick();
            SiteArmazem.listenAddToBudgetClick();
            SiteArmazem.listenRemoveFromBudgetClick();
            SiteArmazem.listenSendFormButtonClick();

            $(window).resize(function() {
                setTimeout(function() {
                    SiteArmazem.cropAndCenterImages();
                }, 200);
            });
        });
    }
}