function isPalindrome(input) {
	const alphanumeric = input.toLowerCase().replace(/[^a-z0-9]/g, '');
	return alphanumeric === alphanumeric.split('').reverse().join('');
}

// Example usage:
const input = "A man, a plan, a canal: Panama";
if (isPalindrome(input)) {
	console.log("The input is a palindrome.");
} else {
	console.log("The input is not a palindrome.");
}