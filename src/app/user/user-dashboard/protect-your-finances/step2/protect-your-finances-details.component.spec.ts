import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProtectYourFinancesDetailsComponent } from './protect-your-finances-details.component';

describe('ProtectYourFinancesDetailsComponent', () => {
  let component: ProtectYourFinancesDetailsComponent;
  let fixture: ComponentFixture<ProtectYourFinancesDetailsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProtectYourFinancesDetailsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProtectYourFinancesDetailsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
