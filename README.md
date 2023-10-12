CHATROOM


Message Schema:

    MessageID (Primary Key): Unique identifier for each message.
    AgentID: The agent who sent the message.
    ChatroomID: The chatroom to which the message belongs (foreign key to the Chatroom schema).
    Content: The text content of the message.
    Timestamp: The timestamp when the message was sent.

