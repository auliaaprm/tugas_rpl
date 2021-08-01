const base_url = $("[name='base_url']").val()

$(document).on("click",".btn-add-to-cart",function(){
	let element = $(this).closest(".card")
	let id_menu = element.data("id")
	let item_amount = element.find(".amount-item").val()
	let url = `${base_url}/user/ajax_add_item_to_cart`
	$.post(
		url,
		{id_menu, item_amount},
		function(resp){
			if (resp) {
				get_cart_item_amount()
			}
		}
	);
})

$(document).on("click",".btn-add-item",function(){
	let element = $(this).closest(".input-group")
	let element_item_amount = element.find(".amount-item")
	let max_amount = element_item_amount.attr("max")
	let current_amount = element_item_amount.val()
	if (parseInt(current_amount) < parseInt(max_amount)) {
		let amount_after = parseInt(current_amount) + 1
		element_item_amount.val(amount_after)
	}
})

$(document).on("click",".btn-decrease-item",function(){
	let element = $(this).closest(".input-group")
	let element_item_amount = element.find(".amount-item")
	let min_amount = element_item_amount.attr("min")
	let current_amount = element_item_amount.val()
	if (parseInt(current_amount) > parseInt(min_amount)) {
		let amount_after = parseInt(current_amount) - 1
		element_item_amount.val(amount_after)
	}
})

function get_cart_item_amount() {
	let url = `${base_url}/user/ajax_get_cart_item_amount`
	$.get(
		url,
		function(resp){
			if (resp) {
				$(".cart-counter").html(resp)
			}
		}
	);
}