def is_palindrome(input):
    alphanumeric = ''.join(char.lower() for char in input if char.isalnum())
    return alphanumeric == alphanumeric[::-1]

  # Example usage:
input = "A man, a plan, a canal: Panama"
if is_palindrome(input):
    print("The input is a palindrome.")
else:
    print("The input is not a palindrome.")