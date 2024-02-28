#!/usr/bin/python3



from flask import Flask, request

app = Flask(__name__)
#Username and password is 'test' 'abcABC123'
userNM = 'test'
passWD = 'abcABC123'

def check_auth(username, password): 
    """Check if a username/password combination is valid"""
    return username == userNM and password == passWD

def  authenticate():
    """Sends a 401 response that enables basic auth."""
    return Response ('Authentication required',401, {'WWW-Authenticate': 'Basic realm="Login Required"'})

@app.route('/users', methods=['POST'] )
def users():
    auth = request.authorization
    if not auth or not check_auth(auth.username, auth.password):
        return authenticate()

    file1 = open("/etc/passwd", "r")
    passwdout = file1.readlines()
    file1.close()
# Make an empty dictionary, hard code a key:value pair
    dictionary = {}
    #whatever = user id something = username
    
    
    for x in passwdout:
        psswd = x.split(":")
        # Print the line list
        print(psswd)
        #Print one part of the line list
        print(psswd[0])
        dictionary[psswd[2]] = psswd[0]
    return dictionary

@app.route('/groups', methods=['POST'])
# same as users
def groups():
    file2 = open("/etc/group","r")
    groupout = file2.readlines()
    file2.close()
# Make an empty dictionary 
    dictionary2 = {}

    for x in groupout:
        groupout = x.split(":")
        #print the line list 
        print(groupout)
        #print one part of the line list 
        print(groupout[0])
        dictionary2[groupout[2]] = groupout[0]
    return dictionary2

if __name__ == '__main__': 
    app.run(host='127.0.0.1', port=3000)


