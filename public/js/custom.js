$(document).ready(function () {
    $("#sale_price").maskMoney({
        prefix: "R$ ",
        decimal: ",",
        thousands: "."
    });
    $("#rent_price").maskMoney({
        prefix: "R$ ",
        decimal: ",",
        thousands: "."
    });
    $("#document_company").inputmask("99.999.999/9999-99");
    $("#telephone").inputmask("(99)-9999-9999");
    $("#cell").inputmask("(99)-99999-9999");
    $("#zipcode").inputmask("99.999-999");
    $("#state").inputmask("AA");

    $("#zipcode").blur(function () {
        function emptyForm() {
            $("#street").val("");
            $("#neighborhood").val("");
            $("#city").val("");
            $("#state").val("");
        }

        var zip_code = $(this).val().replace(/\D/g, "");
        var validate_zip_code = /^[0-9]{8}$/;

        if (zip_code != "" && validate_zip_code.test(zip_code)) {
            $("#street").val("");
            $("#neighborhood").val("");
            $("#city").val("");
            $("#state").val("");

            $.getJSON(
                "https://viacep.com.br/ws/" + zip_code + "/json/?callback=?",
                function (data) {
                    if (!("erro" in data)) {
                        $("#street").val(data.logradouro);
                        $("#neighborhood").val(data.bairro);
                        $("#city").val(data.localidade);
                        $("#state").val(data.uf);
                    } else {
                        emptyForm();
                        alert("CEP não encontrado.");
                    }
                }
            );
        } else {
            emptyForm();
            alert("Formato de CEP inválido.");
        }
    });
});
