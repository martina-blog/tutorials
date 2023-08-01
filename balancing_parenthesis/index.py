def are_parentheses_balanced(string):
    stack = []
    opening = ['(', '[', '{']
    closing = [')', ']', '}']

    for char in string:
        if char in opening:
            stack.append(char)
        elif char in closing:
            if len(stack) == 0 or stack.pop() != opening[closing.index(char)]:
                return False

    return len(stack) == 0

# Example usage:
input = "({[]})"
if are_parentheses_balanced(input):
    print("Parentheses are balanced.")
else:
    print("Parentheses are not balanced.")