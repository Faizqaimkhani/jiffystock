let searchScreen = document.getElementById("searchScreen");
let chatScreen = document.getElementById("chatScreen");
let homeScreen = document.getElementById("homeScreen");
let homeScreenMessagesBody = document.getElementById("homeScreenMessagesBody");
let searchScreenBody = document.getElementById("searchScreenBody");
let loader = document.getElementById('loader');
let chatBody = document.getElementById('msgTarget');
let chatMembers = document.getElementById('chatMembers');
let messageInput = document.getElementById('message-input');
let textStatus = document.getElementById('text_status');
loader.style.display = 'none';
let group_id;
let groupHasShipment = false;
let groupHasClearence = false;

// messages = [
// 	{
// 		image:
// 			"https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/dbc1dd99666153.5ef7dbf39ecee.jpg",
// 		name: "Azan Korejo",
// 		count: 2,
// 		message: "Hey! how are you..",
// 		timeStamp: "Just Now"
// 	},
// ];

function initializeChat(messages) {
	this.registerEventListeners();
	this.appendMessages(messages);
	this.prepareSearch()
}
function prepareSearch() {
	messages.forEach((message) => {
		// Main Element
		var main = document.createElement("div");
		main.classList.add("search-screen-body-item");

		//Image Element
		var img = document.createElement("img");
		img.src = "https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/dbc1dd99666153.5ef7dbf39ecee.jpg";

		// Added Image To Main
		main.appendChild(img);

		// MainContent Element
		var mainContent = document.createElement("div");
		mainContent.classList.add("search-screen-body-item-content");

		// Main Content Top
		var mainContentTop = document.createElement("div");
		mainContentTop.classList.add("search-screen-body-item-content-top");

		// Main Content Top h4
		var mainContentToph4 = document.createElement("h4");
		mainContentToph4.innerText = message.group.name;

		// Main Content Top Span
		var mainContentTopSpan = document.createElement("span");
		if(message.group.conversations[0]?.created_at)
		{
			mainContentTopSpan.innerText = 'last text was '+message.group.conversations[0]?.created_at;
		}
		mainContentTop.appendChild(mainContentToph4);
		mainContentTop.appendChild(mainContentTopSpan);

		mainContent.appendChild(mainContentTop);

		// Main Content Bottom
		var mainContentBottom = document.createElement("div");
		mainContentBottom.classList.add("search-screen-body-item-content-bottom");

		// Main Content Bottom p
		var mainContentBottomp = document.createElement("p");
		mainContentBottomp.innerText = message.group.conversations[0]?.message;

		mainContentBottom.appendChild(mainContentBottomp);

		if (message.count != 0) {
			// var mainContentBottomSpan = document.createElement("span");
			// mainContentBottomSpan.innerText = 2;
			// mainContentBottom.appendChild(mainContentBottomSpan);
		}

		mainContent.appendChild(mainContentBottom);
		main.appendChild(mainContent);
		searchScreenBody.appendChild(main);
	});
}
function searchMessage() {
	let input = document.getElementById("searchInput").value;
	input = input.toLowerCase();
	let x = document.getElementsByClassName("search-screen-body-item");

	for (i = 0; i < x.length; i++) {
		if (!x[i].children[1].innerText.toLowerCase().includes(input)) {
			x[i].style.display = "none";
		} else {
			x[i].style.display = "flex";
		}
	}
}
function fetchMessagesByGroup() {
	homeScreen.style.display = "none ";
	var scope = this;

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url : '/conversations/get/'+this.group_id,
			method: 'POST',
			beforeSend: function () {
				loader.style.display = 'flex';
			},
			success:function(response) {
				if(response.status) {
					scope.openChat(response.data);
					scope.addMembers(response.members)
					scope.setGroupShipmentStatus(response.groupHasShipment)
					scope.setGroupHasClearenceStatus(response.groupHasClearence)
				}
			}
		});
}

function setGroupShipmentStatus(val) {
	this.groupHasShipment = val;
	this.toggleBtn()
	return;
}

function setGroupHasClearenceStatus(val) {
	this.groupHasClearence = val;
	this.toggleBtn()
	return;
}

function getGroupShipmentStatus(val) {
	return this.groupHasShipment;
}

function getGroupHasClearenceStatus(val) {
	return this.groupHasClearence;
}

function appendMessages(messages) {
	messages = JSON.parse(messages);
	this.messages = messages;

	messages.forEach((message,index) => {
		// Main Element
		var main = document.createElement("div");
		main.id = "message";
		main.classList.add("home-screen-messages-message");

		//Image Element
		var img = document.createElement("img");
		img.src = "https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/dbc1dd99666153.5ef7dbf39ecee.jpg";

		// Added Image To Main
		main.appendChild(img);

		// MainContent Element
		var mainContent = document.createElement("div");
		mainContent.classList.add("home-screen-messages-message-content");

		// Main Content Top
		var mainContentTop = document.createElement("div");
		mainContentTop.classList.add("home-screen-messages-message-content-top");

		// Main Content Top h4
		var mainContentToph4 = document.createElement("h4");
		mainContentToph4.innerText = message.group.name;

		// Main Content Top Span
		var mainContentTopSpan = document.createElement("span");
		mainContentTopSpan.classList.add("text-primary");
		mainContentTopSpan.innerText = 'last text was '+`${message.group.conversations[0]?.created_at}`;

		mainContentTop.appendChild(mainContentToph4);
		mainContentTop.appendChild(mainContentTopSpan);

		mainContent.appendChild(mainContentTop);

		// Main Content Bottom
		var mainContentBottom = document.createElement("div");
		mainContentBottom.classList.add("home-screen-messages-message-content-bottom");

		// Main Content Bottom H4
		var mainContentBottomh4 = document.createElement("h4");
		// mainContentBottomh4.innerText = message.message;
		mainContentBottomh4.innerText = message.group.conversations[0]?.message;

		mainContentBottom.appendChild(mainContentBottomh4);

		if (message.count != 0) {
			// var mainContentBottomSpan = document.createElement("span");
			// mainContentBottomSpan.innerText = 2;
			// mainContentBottom.appendChild(mainContentBottomSpan);
		}

		mainContent.appendChild(mainContentBottom);
		main.appendChild(mainContent);
		homeScreenMessagesBody.appendChild(main);

		main.setAttribute('onclick','setGroupId('+message.group_id+')')
	});
}
function openChat(chats) {
	$('#msgTarget').empty()
	chats.forEach((chat,index) => {

		if (chat.self == false) {
			let chatEl = document.createElement('div');
			chatEl.classList.add('message-reciever');

			var img = document.createElement("img");
			img.src = "https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/dbc1dd99666153.5ef7dbf39ecee.jpg";

			chatEl.appendChild(img);

			let message_receiver = document.createElement('div')
			message_receiver.classList.add("message-reciever-content");

			let msg_title = document.createElement('span');
			msg_title.classList.add('message-reciever-content-message');
			msg_title.innerText = chat.message;

			let msg_author = document.createElement('p');
			msg_author.classList.add('text-muted','small');
			msg_author.innerText = chat?.account.name;

			msg_title.appendChild(msg_author);

			message_receiver.appendChild(msg_title);

			let msg_time = document.createElement('span');
			msg_time.classList.add('message-reciever-content-time');
			msg_time.innerText = chat.created_at;

			message_receiver.appendChild(msg_time);

			chatEl.appendChild(message_receiver)

			chatBody.appendChild(chatEl)
		}

		if (chat.self == true) {

			let chatEl = document.createElement('div');
			chatEl.classList.add('message-sender');

			let message_sender = document.createElement('div')
			message_sender.classList.add("message-sender-content");

			let msg_title = document.createElement('span');
			msg_title.classList.add('message-sender-content-message');
			msg_title.innerText = chat.message;

			let msg_author = document.createElement('p');
			msg_author.classList.add('text-muted','small');
			msg_author.innerText = chat?.account.name;

			msg_title.appendChild(msg_author);

			message_sender.appendChild(msg_title);

			let msg_time = document.createElement('span');
			msg_time.classList.add('message-sender-content-time');
			msg_time.innerText = chat.created_at;

			message_sender.appendChild(msg_time);

			chatEl.appendChild(message_sender)

			var img = document.createElement("img");
			img.src = "https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/dbc1dd99666153.5ef7dbf39ecee.jpg";

			chatEl.appendChild(img);

			chatBody.appendChild(chatEl)
		}

	});
	chatScreen.style.display = "block ";
	searchScreen.style.display = "none ";
	loader.style.display = "none ";
	this.scrollToBottom()
}
function addMembers(members) {
	document.querySelectorAll('.chat_member').forEach(e=>e.remove())
	members.forEach((member,index) => {

			let chatMember = document.createElement('span');
			chatMember.classList.add('chat_member');

			var img = document.createElement("img");
			img.src = "https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/dbc1dd99666153.5ef7dbf39ecee.jpg";

			chatMember.appendChild(img);

			let memberName = document.createElement('h6')
			memberName.innerText = member.name;

			chatMember.appendChild(memberName);

			chatMembers.appendChild(chatMember);
	})
}
function updateMembers(){
	let scope = this;
	$.ajax({
		url : '/conversation/get-members',
		method: 'POST',
		data: {
			'group_id' : this.group_id,
		},
		success: function(xhr) {
			if(xhr.status == true) {
				scope.addMembers(xhr.members)
			}
		}
	});
}
function setGroupId(id){
	this.group_id = id;
	this.fetchMessagesByGroup();
	this.listenForMessages(id);
	return;
}
function registerEventListeners() {
	let sendMsgBtn = document.getElementById('send-message');
	let searchButton = document.getElementById("search-button");
	let searchBackButton = document.getElementById("chat-back-button");
	let chatBackbutton = document.getElementById("chatBackbutton");
	let messageInput = document.getElementById("message-input");

	let scope = this;

	sendMsgBtn.addEventListener("click", () => {
		this.sendMessage();
	});

	chatBackbutton.addEventListener("click", function () {
		chatScreen.style.display = "none ";
		searchScreen.style.display = "none ";
		homeScreen.style.display = "block ";
	});

	messageInput.addEventListener("focus", function () {
		textStatus.innerText = 'You are typing'
		scope.scrollToBottom()
	});

	messageInput.addEventListener("focusout", function () {
		textStatus.innerText = ''
	});

	searchButton.addEventListener("click", function () {
		searchScreen.style.display = "block ";
		chatScreen.style.display = "none ";
		homeScreen.style.display = "none ";
	});

	searchBackButton.addEventListener("click", function () {
		searchScreen.style.display = "none ";
		chatScreen.style.display = "none ";
		homeScreen.style.display = "block ";
	});
}
function getGroupId() {
	return this.group_id;
}
function sendMessage() {
	if(messageInput.value == '') {
		this.showNotification('Error', "Message cannot be empty", 'danger')
		return;
	}
	var scope = this;
	textStatus.innerText = 'sending text ....';

	$.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});
	let msg = messageInput.value;
	messageInput.value = ''
	$.ajax({
		url : '/conversations',
		method: 'POST',
		data: {
			'message' : msg,
			'group_id' : this.group_id,
		},
		success: function(xhr) {
			if(xhr.status == true) {
				scope.appendCurrentUserMessage(xhr.data)
				textStatus.innerText = '';
			}
		}
	});
}
function appendCurrentUserMessage(chat) {
	let chatEl = document.createElement('div');
	chatEl.classList.add('message-sender');

	let message_sender = document.createElement('div')
	message_sender.classList.add("message-sender-content");

	let msg_title = document.createElement('span');
	msg_title.classList.add('message-sender-content-message');
	msg_title.innerText = chat.message;

	let msg_author = document.createElement('p');
	msg_author.classList.add('text-muted','small');
	msg_author.innerText = chat?.account.name;

	msg_title.appendChild(msg_author);

	message_sender.appendChild(msg_title);

	let msg_time = document.createElement('span');
	msg_time.classList.add('message-sender-content-time');
	msg_time.innerText = chat.created_at;

	message_sender.appendChild(msg_time);

	chatEl.appendChild(message_sender)

	var img = document.createElement("img");
	img.src = "https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/dbc1dd99666153.5ef7dbf39ecee.jpg";

	chatEl.appendChild(img);

	chatBody.appendChild(chatEl);

	this.scrollToBottom();
}
function appendNewMessage(chat) {

	let chatEl = document.createElement('div');
	chatEl.classList.add('message-reciever');

	var img = document.createElement("img");
	img.src = "https://mir-s3-cdn-cf.behance.net/project_modules/2800_opt_1/dbc1dd99666153.5ef7dbf39ecee.jpg";

	chatEl.appendChild(img);

	let message_receiver = document.createElement('div')
	message_receiver.classList.add("message-reciever-content");

	let msg_title = document.createElement('span');
	msg_title.classList.add('message-reciever-content-message');
	msg_title.innerText = chat.message;
	let msg_author = document.createElement('p');
	msg_author.classList.add('text-muted','small');
	msg_author.innerText = chat?.account.name;

	msg_title.appendChild(msg_author);

	message_receiver.appendChild(msg_title);

	let msg_time = document.createElement('span');
	msg_time.classList.add('message-reciever-content-time');
	msg_time.innerText = chat.created_at;

	message_receiver.appendChild(msg_time);

	chatEl.appendChild(message_receiver)

	chatBody.appendChild(chatEl)
	this.scrollToBottom()
}
function scrollToBottom() {
	document.getElementById('main-scroll').scrollTo(0,document.getElementById('main-scroll').scrollHeight)
}
function showNotification(status, message,type) {
	var notify = $.notify(`<strong>${status}</strong> ${message}...`, { allow_dismiss: true, type: type });
}
function listenForMessages(id) {
	Echo.private('groups.'+id)
				.listen('GroupMessage', (e) => {
					console.log(e.conversation)
					this.appendNewMessage(e.conversation)
				});
}
