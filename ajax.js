var request1 = fetch("https://api.example.com/request1", { method: "POST" });
var request2 = fetch("https://api.example.com/request2", { method: "POST" });
var request3 = fetch("https://api.example.com/request3", { method: "POST" });

Promise.all([request1, request2, request3])
	.then(function (responses) {
		console.log(responses[0].status, "Status of request1");
		console.log(responses[1].status, "Status of request2");
		console.log(responses[2].status, "Status of request3");
	})
	.catch(function (error) {
		alert(error);
	});
