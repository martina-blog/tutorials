class Stack {
	constructor(limit = 10) {
		this.stack = [];
		this.limit = limit;
	}

	push(item) {
		if (this.stack.length < this.limit) {
			this.stack.push(item);
		} else {
			throw new Error('Stack overflow');
		}
	}

	pop() {
		if (this.isEmpty()) {
			throw new Error('Stack underflow');
		} else {
			return this.stack.pop();
		}
	}

	top() {
		return this.stack[this.stack.length - 1];
	}

	isEmpty() {
		return this.stack.length === 0;
	}

	size() {
		return this.stack.length;
	}
}

// Example usage
const stack = new Stack();
stack.push('first');
stack.push('second');
console.log(stack.pop());  // Outputs: second
console.log(stack.top());  // Outputs: first