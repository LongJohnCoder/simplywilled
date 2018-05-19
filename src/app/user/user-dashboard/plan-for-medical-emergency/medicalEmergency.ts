export class MedicalEmergency {
    id: number;
    userId: number;
    fullLegalName: string;
    relation: string;
    address: string;
    city: string;
    state: string;
    zip: string;
    country: string;
    isInform: number;
    emailOfAgent: string;
    isBackupAgent: number;
    backupFullLegalName: string;
    backupRelation: string;
    backupAddress: string;
    backupCity: string;
    backupState: string;
    backupZip: string;
    backupCountry: string;
    isInformBackup: number;
    emailOfBackupAgent: string;
}
