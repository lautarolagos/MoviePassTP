<?php
    namespace Interfaces;
    
    use Models\Ticket as Ticket;
    use DAO\Connection as Connection;

    interface ITicketDAO
    {
        function Add(Ticket $ticket);
    }
?>