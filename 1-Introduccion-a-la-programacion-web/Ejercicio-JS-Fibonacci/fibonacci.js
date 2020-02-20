function fibonacci(num) {
  console.log(num);

  var nextTerm, t1 = 0, t2 = 1;
  var result = "";
  for (var i = 1; i <= num; ++i) {
    result += t1 + " ";
    nextTerm = t1 + t2;
    t1 = t2;
    t2 = nextTerm;
  }

  return result;
}

function getFibonacci() {
  var e = document.getElementById("terminos").value;
  var result = document.getElementById("result");
  var res = fibonacci(e);
  result.innerHTML = res;
}
