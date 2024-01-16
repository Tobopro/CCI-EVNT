<?php

use PHPUnit\Framework\TestCase;
use Models\User;

class UserTest extends TestCase
{
    public function testConstructor()
    {
        $user = new User('John', 'Doe', 'john@example.com', 'password123');

        $this->assertEquals('John', $user->getFirstName());
        $this->assertEquals('Doe', $user->getLastName());
        $this->assertEquals('john@example.com', $user->getEmail());
        $this->assertEquals('password123', $user->getPassword());
    }

    public function testHydrate()
    {
        $data = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'mail' => 'john@example.com',
            'password' => 'password123',
            'city' => 'New York',
            'description' => 'Test user',
            'profilePicture' => null,
            'coverPicture' => null,
            'preferredCategories' => null,
            'isBanned' => false,
            'participationCount' => 0,
            'creationCount' => 0,
            'evntsToCome' => [],
            'evntsParticipated' => [],
            'evntsCreated' => [],
            'evntsLiked' => [],
            'friends' => [],
            'friendRequests' => [],
            'blockedUsers' => [],
            'showFutureEvnts' => true,
            'showPastEvnts' => true,
            'showEvntScores' => true,
            'isPublic' => true,
        ];

        $user = User::hydrate($data);

        $this->assertEquals('John', $user->getFirstName());
        $this->assertEquals('Doe', $user->getLastName());
        $this->assertEquals('john@example.com', $user->getEmail());
        $this->assertEquals('password123', $user->getPassword());
        $this->assertEquals('New York', $user->getCity());
        $this->assertEquals('Test user', $user->getDescription());
        $this->assertEquals(null, $user->getProfilePicture());
        $this->assertEquals(null, $user->getCoverPicture());
        $this->assertEquals(null, $user->getPreferredCategories());
        $this->assertEquals(false, $user->getIsBanned());
        $this->assertEquals(0, $user->getParticipationsCount());
        $this->assertEquals(0, $user->getCreationsCount());
        $this->assertEquals([], $user->getEvntsToCome());
        $this->assertEquals([], $user->getEvntsParticipated());
        $this->assertEquals([], $user->getEvntsCreated());
        $this->assertEquals([], $user->getEvntsLiked());
        $this->assertEquals([], $user->getFriends());
        $this->assertEquals([], $user->getFriendRequests());
        $this->assertEquals([], $user->getBlockedUsers());
        $this->assertEquals(true, $user->getisDisplayFutureEvnts());
        $this->assertEquals(true, $user->getisDisplayPastEvnts());
        $this->assertEquals(true, $user->getisDisplayEvntScores());
        $this->assertEquals(true, $user->getisPublic());
    }
}

