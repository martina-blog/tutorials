function areParenthesesBalanced(str) {
    const stack = [];
    const opening = ['(', '[', '{'];
    const closing = [')', ']', '}'];

    for (let i = 0; i < str.length; i++) {
        const char = str.charAt(i);
        if (opening.includes(char)) {
            stack.push(char);
        } else if (closing.includes(char)) {
            if (stack.length === 0 || stack.pop() !== opening[closing.indexOf(char)]) {
                return false;
            }
        }
    }

    return stack.length === 0;
}

// Example usage:
const input = "({[]})";
if (areParenthesesBalanced(input)) {
    console.log("Parentheses are balanced.");
} else {
    console.log("Parentheses are not balanced.");
}